<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'status',
    ];

    public function barang()
    {
        return $this->hasMany(Produk::class);
    }
}
