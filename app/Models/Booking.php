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
        'user_id',
        'toko_id',
        'diag_id',
        'schedule',
        'address',
        'city',
        'notes',
        'status',
        'total_cost',
    ];

    protected $casts = [
        'schedule' => 'datetime',
    ];

    public function technician(): BelongsTo
    {
        return $this->belongsTo(Technician::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }
    public function isConfirmed()
    {
        return $this->status === 'confirmed';
    }
    public function isProcessing()
    {
        return $this->status === 'processing';
    }
    public function isCompleted()
    {
        return $this->status === 'completed';
    }
}
