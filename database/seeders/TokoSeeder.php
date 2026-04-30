<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $tokos = [
            // KATEGORI 1: Jasa Servis (4 Toko)
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Fajar Printer & Scanner',
                'alamat' => 'Jl. Dharmawangsa No. 123, Gubeng, Surabaya', // <-- Alamat Lengkap
                'kota' => 'Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.8,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Andri Laptop Service',
                'alamat' => 'Jl. Pahlawan No. 45, Sidoarjo Kota, Sidoarjo',
                'kota' => 'Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1588872657578-7efd1f1555ed?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.6,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Budi TV & Monitor',
                'alamat' => 'Jl. Soekarno Hatta No. 9A, Lowokwaru, Malang',
                'kota' => 'Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1512314889357-e157c22f938d?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.9,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Rini Mobile Care',
                'alamat' => 'Plaza Marina Lt. 2 Blok C-15, Wonocolo, Surabaya',
                'kota' => 'Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1601524909162-ae8725290836?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.3,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // KATEGORI 2: Suku Cadang (4 Toko)
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Hana Home Appliance',
                'alamat' => 'Ruko Taman Pinang Indah Blok B1, Sidoarjo',
                'kota' => 'Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.9,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 1,
                'nama_toko' => 'Service Pak Budi',
                'alamat' => 'Klampis Jaya No. 33, Sukolilo, Surabaya',
                'kota' => 'Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1498049794561-7780e7231661?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.5,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Fixora Centre Malang',
                'alamat' => 'Matahari Dept. Store Alun-Alun Lt. 1, Malang',
                'kota' => 'Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.7,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Fixora Battery Waste',
                'alamat' => 'Jl. Gajah Mada No. 88, Sidoarjo',
                'kota' => 'Sidoarjo',
                'foto_cover' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.4,
                'is_verified' => false,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Green E-Waste',
                'alamat' => 'Jl. MT Haryono No. 201, Dinoyo, Malang',
                'kota' => 'Malang',
                'foto_cover' => 'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 5.0,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'kategori_toko_id' => 2,
                'nama_toko' => 'Fixora Centre Surabaya',
                'kota' => 'Surabaya',
                'alamat' => 'Jl. Rungkut Industri Raya No. 15, Surabaya',
                'foto_cover' => 'https://images.unsplash.com/photo-1611284446314-60a58ac0deb9?auto=format&fit=crop&w=600&q=80',
                'logo_toko' => null,
                'rating' => 4.8,
                'is_verified' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('toko')->insert($tokos);
    }
}
