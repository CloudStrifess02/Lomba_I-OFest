<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tambahkan ini agar Str::random bekerja

class DiagnosisController extends Controller
{
    public function index()
    {
        return view('user.diagnosis');
    }

    public function analyze(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'subcategory' => 'required|string',
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|max:5120', 
        ]);

        $description = strtolower($request->description);
        $subcategory = $request->subcategory;

        $noRepairKeywords = [
            'mati total', 'terbakar', 'hancur', 'hangus', 
            'short circuit parah', 'patah', 'meledak', 'remuk'
        ];
        
        $isRepairable = true;
        foreach ($noRepairKeywords as $keyword) {
            if (str_contains($description, $keyword)) {
                $isRepairable = false;
                break;
            }
        }

        $weights = [
            'Laptop' => 2.4,
            'TV' => 12.0,
            'Smartphone' => 0.4,
            'Monitor' => 4.2,
            'Printer' => 5.5,
            'Blender' => 1.5,
            'Kipas' => 2.5,
            'Tablet' => 0.6,
            'Speaker' => 1.8
        ];

        $weightValue = $weights[$subcategory] ?? 2.0;

        $kgSavedValue = number_format($weightValue, 1);
        $co2Value = number_format($weightValue * 1.8, 1);
        
        $costValue = $isRepairable ? rand(1500000, 5000000) : rand(100000, 500000);

        $diagId = 'FXR-' . date('Ymd') . '-' . strtoupper(Str::random(4));

        return response()->json([
            'success' => true,
            'is_repairable' => $isRepairable,
            'device_name' => strtoupper($subcategory) . ' (' . $request->category . ')',
            'diag_id' => $diagId,
            
            // Perhatikan nama variabel di bawah ini untuk JS Anda
            'cost_saved' => 'Rp ' . number_format($costValue, 0, ',', '.'),
            'kg_saved' => $kgSavedValue . ' kg',
            'emission_saved' => $co2Value . ' kg CO₂',
        ]);
    }
}