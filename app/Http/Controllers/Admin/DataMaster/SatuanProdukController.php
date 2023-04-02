<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\SatuanProduk;
use Illuminate\Http\Request;

class SatuanProdukController extends Controller
{
    public function index()
    {
        $satuan_produks = SatuanProduk::orderBy('id','DESC')->get();
        return view('admin.data-master.satuan-produk.index', [
            'satuan_produks' => $satuan_produks,
        ]);
    }

    public function create()
    {
        return view('admin.data-master.satuan-produk.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            "nama" => ['required','max:25'],
        ]);

        SatuanProduk::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => true,
        ]);
        return redirect()->route('admin.data-master.satuan-produk.index')->with("success", "Satuan produk berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $satuan_produk = SatuanProduk::whereId($id)->first();
        return view('admin.data-master.satuan-produk.edit',[
            'satuan_produk' => $satuan_produk,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => ['required','max:25'],
        ]);

        SatuanProduk::whereId($id)->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.data-master.satuan-produk.index')->with("success", "Satuan produk berhasil diedit");
    }

    public function destroy($id)
    {
        $satuan = SatuanProduk::whereId($id)->first();
        if($satuan){
            $satuan->delete();
            return back()->with('success','Satuan produk berhasil dihapus');
        }else{
            return back()->with('error','Satuan produk tidak ditemukan!');
        }
    }
}
