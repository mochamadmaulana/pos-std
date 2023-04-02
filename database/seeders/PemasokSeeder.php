<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use App\Models\TeleponePemasok;
use Illuminate\Database\Seeder;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pemasoks1 = Pemasok::create([
                'perusahaan' => 'PT. Anak Raharja Membangun Indonesia',
                'pemilik' => 'Mochamad Maulana',
                'alamat' => 'Kp.Besar, Kec.Teluknaga, Kab.Tangerang, Prov.Banten 15510',
                'status' => true,
            ]);

        $telepone_pemasok1 = new TeleponePemasok();
        $telepone_pemasok1->pemasok_id = $pemasoks1->id;
        $telepone_pemasok1->nama = 'WhatsApp';
        $telepone_pemasok1->nomor = '083874966186';
        $telepone_pemasok1->save();

        $telepone_pemasok2 = new TeleponePemasok();
        $telepone_pemasok2->pemasok_id = $pemasoks1->id;
        $telepone_pemasok2->nama = 'Ponsel';
        $telepone_pemasok2->nomor = '083874966186';
        $telepone_pemasok2->save();
    }
}
