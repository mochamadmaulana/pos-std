<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'metode_pembayaran',
        'termin_pembayaran_id',
        'quantity',
        'harga',
        'total_harga',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function termin_pembayaran()
    {
        return $this->belongsTo(TerminPembayaran::class);
    }
}
