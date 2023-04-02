<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_pembayaran = [
            [
                'nama' => 'Tunai (Cash)',
                'status' => true,
            ],
            [
                'nama' => 'COD (Cash On Delivery)',
                'status' => true,
            ],
            [
                'nama' => 'Tempo',
                'status' => true,
            ],
        ];
        DB::table('jenis_pembayarans')->insert($jenis_pembayaran);
    }
}
