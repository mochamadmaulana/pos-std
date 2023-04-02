<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'hari',
        'status'
    ];
    public function pembelian()
    {
        return $this->hasMany(Pembelian::class);
    }
}
