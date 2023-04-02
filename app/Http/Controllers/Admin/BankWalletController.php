<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BankWallet;
use Illuminate\Http\Request;

class BankWalletController extends Controller
{
    public function index()
    {
        $bank_wallets = BankWallet::orderBy('id','DESC')->get();
        return view('admin.bank-wallet.index', [
            'bank_wallets' => $bank_wallets,
        ]);
    }

    public function create()
    {
        return view('admin.bank-wallet.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "bank_wallet" => ['required','max:100'],
            "atas_nama" => ['required', 'max:100'],
            "nomor_rekening" => ['required', 'max:50'],
        ]);

        BankWallet::create([
            'bank_wallet' => $request->bank_wallet,
            'atas_nama' => $request->atas_nama,
            'nomor_rekening' => $request->nomor_rekening,
        ]);
        return redirect()->route('admin.bank-wallet.index')->with("success", "Bank/Wallet berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $bank_wallet = BankWallet::whereId($id)->first();
        return view('admin.bank-wallet.edit',[
            'bank_wallet' => $bank_wallet,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "bank_wallet" => ['required','max:100'],
            "atas_nama" => ['required', 'max:100'],
            "nomor_rekening" => ['required', 'max:50'],
        ]);

        BankWallet::whereId($id)->update([
            'bank_wallet' => $request->bank_wallet,
            'atas_nama' => $request->atas_nama,
            'nomor_rekening' => $request->nomor_rekening,
        ]);
        return redirect()->route('admin.bank-wallet.index')->with("success", "Bank/Wallet berhasil diedit");
    }

    public function destroy($id)
    {
        $bank_wallet = BankWallet::whereId($id)->first();
        if($bank_wallet){
            $bank_wallet->delete();
            return back()->with('success','Bank/Wallet berhasil dihapus');
        }else{
            return back()->with('error','Bank/Wallet tidak ditemukan!');
        }
    }
}
