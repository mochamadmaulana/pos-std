<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_produks = [
            [
                'nama' => 'Beras',
                'status' => true,
            ],
            [
                'nama' => 'Minyak Goreng',
                'status' => true,
            ],
        ];

        DB::table('kategori_produks')->insert($kategori_produks);
    }
}
