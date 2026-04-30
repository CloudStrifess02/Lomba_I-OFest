<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $produks = [
            // --- TOKO 1: TechFix Repair (Jasa Servis) ---
            [
                'toko_id' => 1, 'nama_produk' => 'Ganti LCD Smartphone', 'icon' => 'fa-solid fa-mobile-screen',
                'deskripsi_singkat' => 'Pengerjaan 1-2 Jam', 'harga' => 250000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 1, 'nama_produk' => 'Servis Baterai Drop', 'icon' => 'fa-solid fa-battery-full',
                'deskripsi_singkat' => 'Cek tegangan & ganti sel', 'harga' => 100000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 1, 'nama_produk' => 'Ganti Port Charger', 'icon' => 'fa-solid fa-plug',
                'deskripsi_singkat' => 'Konektor longgar / tidak bisa ngecas', 'harga' => 75000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 1, 'nama_produk' => 'Flash Ulang OS Android', 'icon' => 'fa-brands fa-android',
                'deskripsi_singkat' => 'Atasi bootloop & error sistem', 'harga' => 150000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 1, 'nama_produk' => 'Servis IC Power Mati Total', 'icon' => 'fa-solid fa-microchip',
                'deskripsi_singkat' => 'Pengecekan jalur tegangan', 'harga' => 350000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 2: Klinik Laptop Sidoarjo (Jasa Servis) ---
            [
                'toko_id' => 2, 'nama_produk' => 'Cleaning Kipas & Thermal Paste', 'icon' => 'fa-solid fa-fan',
                'deskripsi_singkat' => 'Atasi laptop panas/overheat', 'harga' => 150000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 2, 'nama_produk' => 'Instal Ulang OS & Software', 'icon' => 'fa-solid fa-laptop-code',
                'deskripsi_singkat' => 'Windows / Linux + Office', 'harga' => 100000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 2, 'nama_produk' => 'Servis Engsel Patah', 'icon' => 'fa-solid fa-toolbox',
                'deskripsi_singkat' => 'Cor ulang dudukan baut engsel', 'harga' => 200000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 2, 'nama_produk' => 'Jasa Upgrade RAM/SSD', 'icon' => 'fa-solid fa-memory',
                'deskripsi_singkat' => 'Bawa part sendiri, jasa pasang saja', 'harga' => 50000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 2, 'nama_produk' => 'Ganti Keyboard Laptop', 'icon' => 'fa-solid fa-keyboard',
                'deskripsi_singkat' => 'Termasuk biaya pemasangan tanam', 'harga' => 250000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 3: iCare Apple Service (Jasa Servis) ---
            [
                'toko_id' => 3, 'nama_produk' => 'Ganti Baterai iPhone', 'icon' => 'fa-brands fa-apple',
                'deskripsi_singkat' => 'Original OEM, Garansi 3 Bulan', 'harga' => 450000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 3, 'nama_produk' => 'Ganti LCD iPhone', 'icon' => 'fa-solid fa-mobile',
                'deskripsi_singkat' => 'Truetone aktif', 'harga' => 800000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 3, 'nama_produk' => 'Instal Ulang MacOS', 'icon' => 'fa-solid fa-desktop',
                'deskripsi_singkat' => 'Upgrade/Downgrade versi OS', 'harga' => 200000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 3, 'nama_produk' => 'Servis Logic Board', 'icon' => 'fa-solid fa-microchip',
                'deskripsi_singkat' => 'MacBook mati total / kena air', 'harga' => 1500000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 3, 'nama_produk' => 'Cleaning Speaker & Mic', 'icon' => 'fa-solid fa-volume-high',
                'deskripsi_singkat' => 'Atasi suara kecil/mendem', 'harga' => 100000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 4: FastFix Smartphone (Jasa Servis) ---
            [
                'toko_id' => 4, 'nama_produk' => 'Ganti Kaca / Glass Only', 'icon' => 'fa-solid fa-layer-group',
                'deskripsi_singkat' => 'LCD dalam wajib normal', 'harga' => 200000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 4, 'nama_produk' => 'Servis Tombol Volume/Power', 'icon' => 'fa-solid fa-toggle-on',
                'deskripsi_singkat' => 'Ganti fleksibel tombol', 'harga' => 100000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 4, 'nama_produk' => 'Bypass Akun Google / FRP', 'icon' => 'fa-solid fa-unlock-keyhole',
                'deskripsi_singkat' => 'Lupa pola & email', 'harga' => 150000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 4, 'nama_produk' => 'Ganti Kamera Belakang', 'icon' => 'fa-solid fa-camera',
                'deskripsi_singkat' => 'Kamera buram atau tidak fokus', 'harga' => 250000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 4, 'nama_produk' => 'Perbaikan Sinyal Hilang', 'icon' => 'fa-solid fa-signal',
                'deskripsi_singkat' => 'No Service / Panggilan Darurat', 'harga' => 300000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 5: Electro Parts (Suku Cadang) ---
            [
                'toko_id' => 5, 'nama_produk' => 'RAM Laptop DDR4 8GB', 'icon' => 'fa-solid fa-memory',
                'deskripsi_singkat' => 'Merek Samsung / Kingston', 'harga' => 350000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 5, 'nama_produk' => 'SSD SATA 512GB', 'icon' => 'fa-solid fa-hard-drive',
                'deskripsi_singkat' => 'Health 100%, Copotan', 'harga' => 280000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 5, 'nama_produk' => 'SSD NVMe M.2 1TB', 'icon' => 'fa-solid fa-sd-card',
                'deskripsi_singkat' => 'Kondisi Baru (Garansi 3 Tahun)', 'harga' => 850000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 5, 'nama_produk' => 'Thermal Paste Kryonaut', 'icon' => 'fa-solid fa-droplet',
                'deskripsi_singkat' => 'Thermal Grizzly 1g', 'harga' => 95000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 5, 'nama_produk' => 'Adaptor Charger Universal', 'icon' => 'fa-solid fa-plug-circle-bolt',
                'deskripsi_singkat' => 'Bisa untuk Asus, Acer, Lenovo', 'harga' => 150000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 6: Gudang Komponen (Suku Cadang) ---
            [
                'toko_id' => 6, 'nama_produk' => 'Keyboard Laptop Universal', 'icon' => 'fa-solid fa-keyboard',
                'deskripsi_singkat' => 'Asus/Lenovo/Acer ready', 'harga' => 200000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 6, 'nama_produk' => 'Baterai CMOS', 'icon' => 'fa-solid fa-circle-minus',
                'deskripsi_singkat' => 'CR2032', 'harga' => 15000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 6, 'nama_produk' => 'Caddy DVD to HDD 9.5mm', 'icon' => 'fa-solid fa-compact-disc',
                'deskripsi_singkat' => 'Untuk pasang HDD ke slot DVD', 'harga' => 45000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 6, 'nama_produk' => 'Kipas Processor Intel', 'icon' => 'fa-solid fa-fan',
                'deskripsi_singkat' => 'LGA 1151 / 1200', 'harga' => 75000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 6, 'nama_produk' => 'Kabel Fleksibel Touchpad', 'icon' => 'fa-solid fa-lines-leaning',
                'deskripsi_singkat' => 'Panjang 15cm (8 Pin)', 'harga' => 50000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 7: Pusat LCD Malang (Suku Cadang) ---
            [
                'toko_id' => 7, 'nama_produk' => 'Layar LCD 14 Inch (30 Pin)', 'icon' => 'fa-solid fa-desktop',
                'deskripsi_singkat' => 'Resolusi HD (1366x768)', 'harga' => 750000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 7, 'nama_produk' => 'Layar LED 15.6 Inch IPS', 'icon' => 'fa-solid fa-tv',
                'deskripsi_singkat' => 'Resolusi FHD (1920x1080) 144Hz', 'harga' => 1200000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 7, 'nama_produk' => 'Kabel Fleksibel LCD', 'icon' => 'fa-solid fa-wave-square',
                'deskripsi_singkat' => 'Tersedia berbagai merek laptop', 'harga' => 120000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 7, 'nama_produk' => 'LCD Monitor PC 24 Inch', 'icon' => 'fa-solid fa-display',
                'deskripsi_singkat' => 'Bekas Normal (Merek LG/Samsung)', 'harga' => 800000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 7, 'nama_produk' => 'Inverter Backlight LCD', 'icon' => 'fa-solid fa-lightbulb',
                'deskripsi_singkat' => 'Modul lampu layar', 'harga' => 85000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 8: Baterai Ori Store (Suku Cadang) ---
            [
                'toko_id' => 8, 'nama_produk' => 'Baterai Xiaomi Redmi Note', 'icon' => 'fa-solid fa-car-battery',
                'deskripsi_singkat' => 'Original BN4A / BN53', 'harga' => 180000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 8, 'nama_produk' => 'Baterai Samsung Galaxy A Series', 'icon' => 'fa-solid fa-car-battery',
                'deskripsi_singkat' => 'Original 100%', 'harga' => 220000, 'is_harga_mulai' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 8, 'nama_produk' => 'Baterai Laptop Lenovo Thinkpad', 'icon' => 'fa-solid fa-battery-three-quarters',
                'deskripsi_singkat' => 'Seri X240 / T440 (Eksternal)', 'harga' => 450000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 8, 'nama_produk' => 'Baterai iPhone X Merek Vizz', 'icon' => 'fa-solid fa-battery-half',
                'deskripsi_singkat' => 'Kapasitas lebih besar, Garansi 1 Thn', 'harga' => 250000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 8, 'nama_produk' => 'Powerbank 10000mAh', 'icon' => 'fa-solid fa-charging-station',
                'deskripsi_singkat' => 'Fast Charging 20W', 'harga' => 150000, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 9: Green E-Waste (Pengepul Resmi) ---
            [
                'toko_id' => 9, 'nama_produk' => 'Donasi Elektronik Bekas', 'icon' => 'fa-solid fa-box-open',
                'deskripsi_singkat' => 'Dapatkan hingga 500 Poin', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 9, 'nama_produk' => 'Pick-up TV / Monitor Tabung', 'icon' => 'fa-solid fa-tv',
                'deskripsi_singkat' => 'Gratis penjemputan', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 9, 'nama_produk' => 'Setor Kabel & Charger Rusak', 'icon' => 'fa-solid fa-plug-circle-xmark',
                'deskripsi_singkat' => 'Tukar dengan 100 Poin / kg', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 9, 'nama_produk' => 'Daur Ulang Baterai Bekas', 'icon' => 'fa-solid fa-recycle',
                'deskripsi_singkat' => 'Pembuangan limbah B3 yang aman', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 9, 'nama_produk' => 'Jemput Kulkas / Mesin Cuci', 'icon' => 'fa-solid fa-truck-pickup',
                'deskripsi_singkat' => 'Layanan jemput barang besar', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],

            // --- TOKO 10: Sirkular Elektronik (Pengepul Resmi) ---
            [
                'toko_id' => 10, 'nama_produk' => 'Jual Beli HP Rusak (Kanibal)', 'icon' => 'fa-solid fa-mobile-retro',
                'deskripsi_singkat' => 'Dinilai langsung di tempat (Nego)', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 10, 'nama_produk' => 'Beli Motherboard Mati', 'icon' => 'fa-solid fa-microchip',
                'deskripsi_singkat' => 'Dihargai per Kg', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 10, 'nama_produk' => 'Terima Monitor / TV LED Rusak', 'icon' => 'fa-solid fa-display',
                'deskripsi_singkat' => 'Kondisi layar pecah tetap diterima', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 10, 'nama_produk' => 'Tukar Tambah RAM Bekas', 'icon' => 'fa-solid fa-memory',
                'deskripsi_singkat' => 'Tukar tambah dengan part copotan', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'toko_id' => 10, 'nama_produk' => 'Pengepulan E-Waste Kantor', 'icon' => 'fa-solid fa-building',
                'deskripsi_singkat' => 'Borongan komputer/printer eks kantor', 'harga' => null, 'is_harga_mulai' => false,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ];

        // Eksekusi insert secara massal (chunk bisa digunakan jika data sangat besar, namun 50 data ini aman dijalankan langsung)
        DB::table('produk')->insert($produks);
    }
}