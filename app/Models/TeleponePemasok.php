<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeleponePemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemasok_id',
        'nama',
        'nomor',
    ];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }
}
