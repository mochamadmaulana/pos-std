<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'perusahaan',
        'pemilik',
        'alamat',
        'status',
    ];

    public function telepone_pemasok()
    {
        return $this->hasMany(TeleponePemasok::class);
    }
    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
