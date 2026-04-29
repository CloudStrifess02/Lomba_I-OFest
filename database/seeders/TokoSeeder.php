<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TokoSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $tokos = [
            // KATEGORI 1: Jasa Servis (4 Toko)
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'TechFix Repair',
                'lokasi' => 'Jl. Dharmawangsa No. 123, Gubeng, Surabaya', // <-- Alamat Lengkap
                'foto_cover' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'TF',
                'rating' => 4.8,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Klinik Laptop Sidoarjo',
                'lokasi' => 'Jl. Pahlawan No. 45, Sidoarjo Kota, Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'KL',
                'rating' => 4.6,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'iCare Apple Service',
                'lokasi' => 'Jl. Soekarno Hatta No. 9A, Lowokwaru, Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1512314889357-e157c22f938d?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'iC',
                'rating' => 4.9,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'FastFix Smartphone',
                'lokasi' => 'Plaza Marina Lt. 2 Blok C-15, Wonocolo, Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1601524909162-ae8725290836?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'FF',
                'rating' => 4.3,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // KATEGORI 2: Suku Cadang (4 Toko)
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Electro Parts',
                'lokasi' => 'Ruko Taman Pinang Indah Blok B1, Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'EP',
                'rating' => 4.9,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Gudang Komponen',
                'lokasi' => 'Klampis Jaya No. 33, Sukolilo, Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'GK',
                'rating' => 4.5,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Pusat LCD Malang',
                'lokasi' => 'Matahari Dept. Store Alun-Alun Lt. 1, Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1544727219-c0cdd27eb568?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'PL',
                'rating' => 4.7,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Baterai Ori Store',
                'lokasi' => 'Jl. Gajah Mada No. 88, Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1619642054628-98e3fb6b87da?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'BO',
                'rating' => 4.4,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // KATEGORI 3: Pengepul Resmi (2 Toko)
            [
                'user_id' => 1,
                'kategori_toko_id' => 3,
                'nama_toko' => 'Green E-Waste',
                'lokasi' => 'Jl. MT Haryono No. 201, Dinoyo, Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'GE',
                'rating' => 5.0,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 3,
                'nama_toko' => 'Sirkular Elektronik',
                'lokasi' => 'Jl. Rungkut Industri Raya No. 15, Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => 'SE',
                'rating' => 4.8,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('toko')->insert($tokos);
    }
}