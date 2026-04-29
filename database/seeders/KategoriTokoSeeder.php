<?php

namespace Database\Seeders;

use App\Models\KategoriToko;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriTokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoriToko::create([
            'nama_kategori' => 'Jasa Servis',
        ]);

        KategoriToko::create([
            'nama_kategori' => 'Suku Cadang',
        ]);

        KategoriToko::create([
            'nama_kategori' => 'Pengepul Resmi',
        ]);
    }
}
