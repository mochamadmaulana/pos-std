<?php

use Illuminate\Support\Facades\Route;

//Route Dashboard
Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');

//Route Data Master
Route::prefix('data-master')->name('data-master.')->group(function () {
    Route::resource('kategori-produk', \App\Http\Controllers\Admin\DataMaster\KategoriProdukController::class);
    Route::resource('satuan-produk', \App\Http\Controllers\Admin\DataMaster\SatuanProdukController::class);
    Route::resource('jenis-pembayaran', \App\Http\Controllers\Admin\DataMaster\JenisPembayaranController::class);
    Route::resource('termin-pembayaran', \App\Http\Controllers\Admin\DataMaster\TerminPembayaranController::class);
});

// Route Pemasok
Route::resource('pemasok', \App\Http\Controllers\Admin\PemasokController::class)->except('show');
Route::post('telepone_pemasok/{pemasok}/add', [\App\Http\Controllers\Admin\PemasokController::class,'add_telepone'])->name('telepone_pemasok.add');
Route::get('telepone_pemasok/{id}/delete',[\App\Http\Controllers\Admin\PemasokController::class, 'delete_telepone'])->name('telepone_pemasok.delete');
Route::post('telepone_pemasok/{id}/edit',[\App\Http\Controllers\Admin\PemasokController::class, 'edit_telepone'])->name('telepone_pemasok.edit');

// Route Produk
Route::resource('produk', \App\Http\Controllers\Admin\ProdukController::class)->except('show');

// Route Bank Wallet
Route::resource('bank-wallet', \App\Http\Controllers\Admin\BankWalletController::class)->except('show');

// Route Pembelian
Route::resource('pembelian', \App\Http\Controllers\Admin\PembelianController::class)->except('show');

