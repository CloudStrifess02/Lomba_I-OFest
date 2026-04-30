<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KategoriToko;

class Toko extends Model
{
    use HasFactory;

    protected $table = 'toko';
    protected $fillable = [
        'user_id', 
        'kategori_toko_id', 
        'nama_toko', 
        'lokasi', 
        'foto_cover', 
        'logo_toko', 
        'rating', 
        'is_verified'
    ];

    // Relasi: Toko dimiliki oleh satu User (Pemilik)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Toko masuk dalam satu Kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriToko::class, 'kategori_toko_id');
    }

    // Relasi: Toko memiliki banyak Produk/Layanan
    public function produk()
    {
        return $this->hasMany(Produk::class, 'toko_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'toko_id');
    }
}