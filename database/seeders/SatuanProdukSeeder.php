<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan_produks = [
            [
                'nama' => 'Kg',
                'deskripsi' => 'Kilogram',
                'status' => true,
            ],
            [
                'nama' => 'Liter',
                'deskripsi' => 'Literan',
                'status' => true,
            ],
            [
                'nama' => 'Pcs',
                'deskripsi' => 'Pieces',
                'status' => true,
            ],
        ];

        DB::table('satuan_produks')->insert($satuan_produks);
    }
}
