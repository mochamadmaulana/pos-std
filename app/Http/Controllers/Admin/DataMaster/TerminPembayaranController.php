<?php

namespace App\Http\Controllers\Admin\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\TerminPembayaran;
use Illuminate\Http\Request;

class TerminPembayaranController extends Controller
{
    public function index()
    {
        $termin_pembayarans = TerminPembayaran::orderBy('id','DESC')->get();
        return view('admin.data-master.termin-pembayaran.index', [
            'termin_pembayarans' => $termin_pembayarans,
        ]);
    }

    public function create()
    {
        return view('admin.data-master.termin-pembayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "nama" => ['required','max:25'],
            "hari" => ['required','max:2'],
        ]);

        TerminPembayaran::create([
            'nama' => $request->nama,
            'hari' => $request->hari,
            'status' => true,
        ]);
        return redirect()->route('admin.data-master.termin-pembayaran.index')->with("success", "Termin pembayaran berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $termin_pembayaran = TerminPembayaran::whereId($id)->first();
        return view('admin.data-master.termin-pembayaran.edit',[
            'termin_pembayaran' => $termin_pembayaran,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "nama" => ['required','max:25'],
            "hari" => ['required','max:2'],
        ]);

        TerminPembayaran::whereId($id)->update([
            'nama' => $request->nama,
            'hari' => $request->hari,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.data-master.termin-pembayaran.index')->with("success", "Termin pembayaran berhasil diedit");
    }

    public function destroy($id)
    {
        $termin = TerminPembayaran::whereId($id)->first();
        if($termin){
            $termin->delete();
            return back()->with('success','Termin pembayaran berhasil dihapus');
        }else{
            return back()->with('error','Termin pembayaran tidak ditemukan!');
        }
    }
}
