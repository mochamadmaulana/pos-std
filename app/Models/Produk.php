<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Produk extends Model
{
    use HasFactory, AutoNumberTrait;

    protected $fillable = [
        'kode',
        'nama',
        'satuan_id',
        'kategori_id',
        'pemasok_id',
        'stok',
    ];

    public function getAutoNumberOptions()
    {
        return [
            'kode' => [
                'format' => 'PRD-?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanProduk::class);
    }
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
