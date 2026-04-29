<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        // 'user_id',
        'technician_id',
        'diag_id',
        'schedule',
        'address',
        'city',
        'notes',
        'status',
        'total_cost',
    ];

    /**
     * Casting atribut agar otomatis menjadi objek Carbon (untuk manipulasi waktu)
     */
    protected $casts = [
        'schedule' => 'datetime',
    ];

    /**
     * Relasi ke Pelanggan (User yang memesan)
     */
    // public function customer(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    /**
     * Relasi ke Teknisi yang dipilih
     */
    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    /**
     * Helper untuk mengecek status perbaikan (Digunakan di UI Progress Tracker)
     */
    public function isPending() { return $this->status === 'pending'; }
    public function isConfirmed() { return $this->status === 'confirmed'; }
    public function isProcessing() { return $this->status === 'processing'; }
    public function isCompleted() { return $this->status === 'completed'; }
}