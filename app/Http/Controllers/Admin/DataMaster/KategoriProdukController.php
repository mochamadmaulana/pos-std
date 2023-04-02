<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function index()
    {
        $kategori_produks = KategoriProduk::orderBy('id','DESC')->get();
        return view('admin.data-master.kategori-produk.index', [
            'kategori_produks' => $kategori_produks,
        ]);
    }

    public function create()
    {
        return view('admin.data-master.kategori-produk.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            "nama" => ['required','max:25'],
        ]);

        KategoriProduk::create([
            'nama' => $request->nama,
            'status' => true,
        ]);
        return redirect()->route('admin.data-master.kategori-produk.index')->with("success", "Kategori produk berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kategori = KategoriProduk::whereId($id)->first();
        return view('admin.data-master.kategori-produk.edit',[
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => ['required','max:25'],
        ]);

        KategoriProduk::whereId($id)->update([
            'nama' => $request->nama,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.data-master.kategori-produk.index')->with("success", "Kategori produk berhasil diedit");
    }

    public function destroy($id)
    {
        $kategori = KategoriProduk::whereId($id)->first();
        if($kategori){
            $kategori->delete();
            return back()->with('success','Kategori produk berhasil dihapus');
        }else{
            return back()->with('error','Kategori produk tidak ditemukan!');
        }
    }
}
