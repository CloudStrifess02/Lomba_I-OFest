<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko; 
use App\Models\Booking;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $diagnosis = [
            'diag_id' => $request->query('diag_id'),
            'device_name' => $request->query('device_name'),
            'category' => $request->query('category'),
        ];

        // Perbaikan: Ganti 'kategoriToko' menjadi 'kategori' sesuai nama fungsi di Model Toko
        $toko = Toko::with(['user', 'kategori'])
            ->orderBy('rating', 'desc')
            ->get();

        return view('user.teknisi', compact('toko', 'diagnosis'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk melakukan booking.');
        }

        $request->validate([
            'toko_id' => 'required|exists:toko,id', 
            'diag_id' => 'required',
            'schedule' => 'required|date|after:now',
            'address' => 'required|string|min:10',
        ]);

        try {
            $bookingId = 'BK-' . date('Ymd') . '-' . strtoupper(Str::random(4));

            $booking = new Booking();
            $booking->booking_id = $bookingId;
            $booking->user_id = Auth::id(); 
            $booking->toko_id = $request->toko_id; 
            $booking->diag_id = $request->diag_id;
            $booking->schedule = $request->schedule;
            $booking->address = $request->address;
            $booking->status = 'pending';
            
            $booking->save();

            return redirect()->route('booking.success', ['booking_id' => $booking->booking_id])
                             ->with('success', 'Booking di toko berhasil dibuat!');

        } catch (\Exception $e) {
            Log::error("Booking Error: " . $e->getMessage());
            return back()->withInput()->with('error', 'Gagal menyimpan booking.');
        }
    }

    public function success($booking_id)
    {
        $booking = Booking::where('booking_id', $booking_id)
            ->where('user_id', Auth::id()) 
            ->with(['toko.kategori', 'user']) // Mengambil data toko beserta kategorinya
            ->firstOrFail();

        return view('user.diagnosis', compact('booking'))->with('success', 'Booking berhasil dibuat!'); 
    }
}