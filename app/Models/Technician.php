<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_name',
        'description',
        'rating',
        'total_reviews',
        'is_verified',
        'is_available',
        'price_min',
        'price_max',
        'latitude',
        'longitude',
    ];

    /**
     * Relasi ke User (Akun teknisi)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel Booking (Daftar order yang diterima teknisi)
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}