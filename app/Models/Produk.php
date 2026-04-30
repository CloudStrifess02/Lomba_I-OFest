<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $fillable = [
        'toko_id', 
        'nama_produk', 
        'deskripsi_singkat', 
        'icon', 
        'harga', 
        'is_harga_mulai'
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }
}