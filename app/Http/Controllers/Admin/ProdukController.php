<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Pemasok;
use App\Models\Produk;
use App\Models\SatuanProduk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::orderBy('id','DESC')->get();
        return view('admin.produk.index', [
            'produks' => $produks,
        ]);
    }

    public function create()
    {
        $satuan_produks = SatuanProduk::orderBy('id','DESC')->get();
        $kategori_produks = KategoriProduk::orderBy('id','DESC')->get();
        $pemasoks = Pemasok::orderBy('id','DESC')->get();
        return view('admin.produk.create',[
            'satuan_produks' => $satuan_produks,
            'kategori_produks' => $kategori_produks,
            'pemasoks' => $pemasoks,
        ]);
    }

    public function store(Request $request)
    {
         $request->validate([
            "nama" => ['required','max:50'],
            "satuan" => ['required'],
            "kategori" => ['required'],
            "pemasok" => ['required'],
        ]);

        Produk::create([
            'nama' => $request->nama,
            'satuan_id' => $request->satuan,
            'kategori_id' => $request->kategori,
            'pemasok_id' => $request->pemasok,
            'stok' => 0,
        ]);
        return redirect()->route('admin.produk.index')->with("success", "Produk berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produk = Produk::whereId($id)->first();
        $satuan_produks = SatuanProduk::orderBy('id','DESC')->get();
        $kategori_produks = KategoriProduk::orderBy('id','DESC')->get();
        $pemasoks = Pemasok::orderBy('id','DESC')->get();
        return view('admin.produk.edit',[
            'produk' => $produk,
            'satuan_produks' => $satuan_produks,
            'kategori_produks' => $kategori_produks,
            'pemasoks' => $pemasoks,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => ['required','max:50'],
            "satuan" => ['required'],
            "kategori" => ['required'],
            "pemasok" => ['required'],
        ]);

        Produk::whereId($id)->update([
            'nama' => $request->nama,
            'satuan_id' => $request->satuan,
            'kategori_id' => $request->kategori,
            'pemasok_id' => $request->pemasok,
        ]);
        return redirect()->route('admin.produk.index')->with("success", "Produk berhasil diedit");
    }

    public function destroy($id)
    {
        $produk = Produk::whereId($id)->first();
        if($produk){
            $produk->delete();
            return back()->with('success','Produk berhasil dihapus');
        }else{
            return back()->with('error','Produk tidak ditemukan!');
        }
    }
}
