<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Menampilkan halaman formulir registrasi
     */
    public function showRegistrationForm()
    {
        // Ubah ke 'user.register' sesuai dengan struktur folder Anda
        return view('user.register'); 
    }

    /**
     * Menangani proses registrasi dan validasi data
     */
    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            // Tambahkan '|confirmed' jika di form Anda ada input konfirmasi password
            'password' => 'required|string|min:8', 
        ], [
            // Pesan error kustom (opsional, agar bahasa Indonesia)
            'name.required'     => 'Nama wajib diisi.',
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'email.unique'      => 'Email ini sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal harus 8 karakter.',
        ]);

        // 2. Simpan Data User Baru ke Database
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Otomatis Login setelah berhasil mendaftar
        Auth::login($user);

        // 4. Arahkan ke halaman utama/dashboard
        return redirect()->route('dashboard');
    }
}