<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiagnosisController extends Controller
{
    public function index(Request $request)
    {
        $diagnosis = [
            'diag_id' => $request->query('diag_id', 'FXR-UNKNOWN'),
            'device_name' => $request->query('device_name', 'Perangkat Tidak Diketahui'),
            'category' => $request->query('category')
        ];

        $technicians = Technician::with('user')
            ->where('is_available', true)
            ->orderBy('rating', 'desc')
            ->get();

        return view('user.diagnosis', compact('technicians', 'diagnosis'));
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'description' => 'required|string|min:3',
            'image' => 'nullable|image|max:5120',
        ]);

        $description = strtolower($request->description);
        $subcategory = $request->subcategory;

        $noRepairKeywords = [
            'mati total',
            'terbakar',
            'hancur',
            'hangus',
            'short circuit parah',
            'patah',
            'meledak',
            'remuk'
        ];

        $isRepairable = true;
        foreach ($noRepairKeywords as $keyword) {
            if (str_contains($description, $keyword)) {
                $isRepairable = false;
                break;
            }
        }

        if ($request->hasFile('image') && $isRepairable) {
            try {
                $imageData = base64_encode(file_get_contents($request->file('image')->getRealPath()));
                $mimeType  = $request->file('image')->getMimeType();

                $response = \Illuminate\Support\Facades\Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . env('GEMINI_API_KEY'), [
                    'contents' => [
                        [
                            'parts' => [
                                ['inline_data' => ['mime_type' => $mimeType, 'data' => $imageData]],
                                ['text' => "Analyze this {$subcategory} image. Is it physically destroyed beyond repair (e.g. shattered, burnt, or crushed)? Answer ONLY in JSON format: {\"is_repairable\": true/false}"]
                            ]
                        ]
                    ]
                ]);

                if ($response->successful()) {
                    $text = $response->json('candidates.0.content.parts.0.text');
                    $text = trim(str_replace(['```json', '```'], '', $text));
                    $aiResult = json_decode($text, true);

                    if (isset($aiResult['is_repairable']) && $aiResult['is_repairable'] === false) {
                        $isRepairable = false;
                    }
                }
            } catch (\Exception $e) {
            }
        }

        $weights = [
            'Laptop' => 2.4,
            'Desktop PC' => 8.0,
            'Monitor' => 4.2,
            'Keyboard' => 0.5,
            'Mouse' => 0.2,
            'Smartphone' => 0.4,
            'Tablet' => 0.6,
            'Smartwatch' => 0.1,
            'Feature Phone' => 0.3,
            'Rice Cooker' => 2.5,
            'Blender' => 1.5,
            'Microwave' => 12.0,
            'Refrigerator' => 40.0,
            'Washing Machine' => 30.0,
            'Electric Fan' => 2.5,
            'Television' => 12.0,
            'Speaker' => 1.8,
            'Headphones' => 0.3,
            'Game Console' => 3.0,
            'DVD Player' => 2.0,
            'Printer' => 5.5,
            'Scanner' => 4.0,
            'Projector' => 3.5,
            'Router' => 0.8,
            'Modem' => 0.5,
            'Charger' => 0.2,
            'Battery' => 0.3,
            'Cable' => 0.1,
            'Power Bank' => 0.4,
            'Hard Drive' => 0.6,
            'SSD' => 0.2
        ];

        $weightValue = $weights[$subcategory] ?? 2.0;
        $kgSavedValue = number_format($weightValue, 1);
        $co2Value = number_format($weightValue * 1.8, 1);

        $costSavedPercent = $isRepairable ? rand(60, 90) : rand(10, 40);

        $diagId = 'FXR-' . date('Ymd') . '-' . strtoupper(\Illuminate\Support\Str::random(4));

        return response()->json([
            'success' => true,
            'is_repairable' => $isRepairable,
            'device_name' => strtoupper($subcategory) . ' (' . $request->category . ')',
            'diag_id' => $diagId,
            'cost_saved' => $costSavedPercent . '%',
            'kg_saved' => $kgSavedValue . ' kg',
            'emission_saved' => $co2Value . ' kg CO₂',
        ]);
    }
}
