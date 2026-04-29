<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;

class KategoriToko extends Model
{
    use HasFactory;

    protected $table = 'kategori_toko';
    protected $fillable = ['nama_kategori'];

    public function toko()
    {
        return $this->hasMany(Toko::class, 'kategori_toko_id');
    }
}