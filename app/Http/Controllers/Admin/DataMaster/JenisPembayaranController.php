<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\JenisPembayaran;
use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        $jenis_pembayarans = JenisPembayaran::orderBy('id','DESC')->get();
        return view('admin.data-master.jenis-pembayaran.index', [
            'jenis_pembayarans' => $jenis_pembayarans,
        ]);
    }

    public function create()
    {
        return view('admin.data-master.jenis-pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama" => ['required','max:25'],
        ]);

        JenisPembayaran::create([
            'nama' => $request->nama,
            'status' => true,
        ]);
        return redirect()->route('admin.data-master.jenis-pembayaran.index')->with("success", "Jenis pembayaran berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $jenis_pembayaran = JenisPembayaran::whereId($id)->first();
        return view('admin.data-master.jenis-pembayaran.edit',[
            'jenis_pembayaran' => $jenis_pembayaran,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => ['required','max:25'],
        ]);

        JenisPembayaran::whereId($id)->update([
            'nama' => $request->nama,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.data-master.jenis-pembayaran.index')->with("success", "Jenis pembayaran berhasil diedit");
    }

    public function destroy($id)
    {
        $jenis_pembayaran = JenisPembayaran::whereId($id)->first();
        if($jenis_pembayaran){
            $jenis_pembayaran->delete();
            return back()->with('success','Jenis pembayaran berhasil dihapus');
        }else{
            return back()->with('error','Jenis pembayaran tidak ditemukan!');
        }
    }
}
