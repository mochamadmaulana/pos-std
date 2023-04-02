<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankWallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_wallet',
        'atas_nama',
        'nomor_rekening'
    ];
}
