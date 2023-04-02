<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerminPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $termin_pembayaran = [
            [
                'nama' => '1 Bulan',
                'hari' => '30',
                'status' => true,
            ],
            [
                'nama' => '2 Minggu',
                'hari' => '14',
                'status' => true,
            ],
            [
                'nama' => '1 Minggu',
                'hari' => '7',
                'status' => true,
            ],
        ];
        DB::table('termin_pembayarans')->insert($termin_pembayaran);
    }
}
