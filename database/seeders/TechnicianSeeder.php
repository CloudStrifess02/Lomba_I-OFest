<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Technician;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data Dummy Teknisi
        $data = [
            [
                'name' => 'Andri Wijaya',
                'email' => 'andri@fixora.com',
                'shop_name' => 'Andri Laptop Service',
                'description' => 'Spesialis perbaikan motherboard laptop, ganti keyboard, dan pembersihan thermal paste.',
                'rating' => 4.9,
                'total_reviews' => 128,
                'price_min' => 150000,
                'price_max' => 2500000,
                'is_verified' => true,
                'lat' => -7.3338, // Koordinat sekitar Surabaya
                'lng' => 112.7212
            ],
            [
                'name' => 'Rini Puspita',
                'email' => 'rini@fixora.com',
                'shop_name' => 'Rini Mobile Care',
                'description' => 'Ahli dalam penggantian LCD smartphone, ganti baterai, dan perbaikan software (flash/root).',
                'rating' => 4.7,
                'total_reviews' => 94,
                'price_min' => 100000,
                'price_max' => 3500000,
                'is_verified' => true,
                'lat' => -7.2892,
                'lng' => 112.6756
            ],
            [
                'name' => 'Budi Hartono',
                'email' => 'budi@fixora.com',
                'shop_name' => 'Budi TV & Monitor',
                'description' => 'Menerima servis TV LED, Monitor PC, dan proyektor. Berpengalaman lebih dari 10 tahun.',
                'rating' => 4.8,
                'total_reviews' => 211,
                'price_min' => 200000,
                'price_max' => 1500000,
                'is_verified' => false,
                'lat' => -7.4478, // Sidoarjo
                'lng' => 112.7183
            ],
            [
                'name' => 'Fajar Nugraha',
                'email' => 'fajar@fixora.com',
                'shop_name' => 'Fajar Printer & Scanner',
                'description' => 'Servis spesialis printer inkjet dan laserjet, infus sistem, hingga penggantian print head.',
                'rating' => 4.9,
                'total_reviews' => 156,
                'price_min' => 75000,
                'price_max' => 1200000,
                'is_verified' => true,
                'lat' => -7.2794, // Surabaya Timur (Mulyorejo)
                'lng' => 112.7883
            ],
            [
                'name' => 'Lia Kurniawan',
                'email' => 'lia@fixora.com',
                'shop_name' => 'Lia Camera & Drone',
                'description' => 'Ahli perbaikan kamera DSLR, Mirrorless, hingga drone. Pembersihan sensor dan perbaikan lensa jamuran.',
                'rating' => 4.5,
                'total_reviews' => 63,
                'price_min' => 250000,
                'price_max' => 5000000,
                'is_verified' => true,
                'lat' => -7.2185, // Surabaya Utara (Perak)
                'lng' => 112.7348
            ],
            [
                'name' => 'Hana Andini',
                'email' => 'hana@fixora.com',
                'shop_name' => 'Hana Home Appliance',
                'description' => 'Menerima servis peralatan rumah tangga kecil seperti blender, rice cooker, kipas angin, dan microwave.',
                'rating' => 4.9,
                'total_reviews' => 97,
                'price_min' => 50000,
                'price_max' => 800000,
                'is_verified' => false,
                'lat' => -7.1585, // Gresik
                'lng' => 112.6555
            ]
        ];

        foreach ($data as $item) {
            // $user = User::create([
            //     'name' => $item['name'],
            //     'email' => $item['email'],
            //     'password' => Hash::make('password123'),
            // ]);

            Technician::create([
                // 'user_id' => $user->id,
                'shop_name' => $item['shop_name'],
                'description' => $item['description'],
                'rating' => $item['rating'],
                'total_reviews' => $item['total_reviews'],
                'price_min' => $item['price_min'],
                'price_max' => $item['price_max'],
                'is_verified' => $item['is_verified'],
                'is_available' => true,
                'latitude' => $item['lat'],
                'longitude' => $item['lng'],
            ]);
        }

        $this->command->info('Seed data teknisi berhasil dibuat!');
    }
}
