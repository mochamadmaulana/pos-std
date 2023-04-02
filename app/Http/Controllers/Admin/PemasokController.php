<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemasok;
use App\Models\TeleponePemasok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PemasokController extends Controller
{
    public function index()
    {
        $pemasoks = Pemasok::with('telepone_pemasok')->orderBy('id','DESC')->get();
        return view('admin.pemasok.index', [
            'pemasoks' => $pemasoks,
        ]);
    }

    public function create()
    {
        return view('admin.pemasok.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            "perusahaan" => ["required"],
            "jenis_telepone" => ['required'],
            "jenis_telepone.*" => ['required','max:30'],
            "telepone" => ['required'],
            "telepone.*" => ['required','max:15'],
        ]);

        try {
            DB::beginTransaction();
            $pemasok = Pemasok::create([
                'perusahaan' => $request->perusahaan,
                'pemilik' => $request->pemilik,
                'alamat' => $request->alamat,
                'status' => true,
            ]);
            if($request->jenis_telepone >= 1 && $request->telepone >= 1){
                for ($i=0; $i < count($request->jenis_telepone); $i++) {
                    TeleponePemasok::create([
                        'pemasok_id' => $pemasok->id,
                        'nama' => $request->jenis_telepone[$i],
                        'nomor' => $request->telepone[$i],
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('admin.pemasok.index')->with("success", "Pemasok berhasil ditambahkan");
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.pemasok.create')->with("error", "Pemasok gagal ditambahkan!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pemasok = Pemasok::with('telepone_pemasok')->whereId($id)->first();
        return view('admin.pemasok.edit',[
            'pemasok' => $pemasok,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "perusahaan" => ["required"]
        ]);

        Pemasok::where('id',$id)->update([
            'perusahaan' => $request->perusahaan,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);
        return redirect()->route('admin.pemasok.index')->with("success", "Pemasok berhasil diedit");
    }

    public function destroy($id)
    {
        $pemasok = Pemasok::with('telepone_pemasok')->whereId($id)->first();
        if($pemasok){
            foreach ($pemasok->telepone_pemasok as $telepone_pemasok) {
                TeleponePemasok::whereId($telepone_pemasok->id)->delete();
            }
            $pemasok->delete();
            return back()->with('success','Pemasok berhasil dihapus');
        }else{
            return back()->with('error','Pemasok tidak ditemukan!');
        }
    }

    public function delete_telepone($id)
    {
        $telepone_pemasok = TeleponePemasok::where('id',$id)->first();
        $telepone_pemasok->delete();
        return back()->with('success','Telepone ' . $telepone_pemasok->nama .' (' . $telepone_pemasok->nomor . ') berhasil dihapus!');
    }

    public function add_telepone(Request $request, $pemasok)
    {
        $validator = Validator::make($request->all(),[
            "jenis_telepone" => ['required'],
            "jenis_telepone.*" => ['required','max:30'],
            "telepone" => ['required'],
            "telepone.*" => ['required','max:15'],
        ]);

        if ($validator->fails()) {
            Session::flash('error','Semua inputan harus diisi!');
            return redirect()->route('admin.pemasok.edit',$pemasok)->withErrors($validator);
        }

        for ($i=0; $i < count($request->jenis_telepone); $i++) {
            TeleponePemasok::create([
                'pemasok_id' => $pemasok,
                'nama' => $request->jenis_telepone[$i],
                'nomor' => $request->telepone[$i]
            ]);
        }
        return back()->with('success','Telepone berhasil ditambahkan');
    }
}
