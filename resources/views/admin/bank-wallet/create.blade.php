@extends('layouts.app', ['title' => 'Bank/Wallet','icon' => 'fas fa-credit-card'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Form Tambah</h3>
                <a href="{{ route('admin.bank-wallet.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bank-wallet.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Bank/Wallet <span class="text-red">*</span></label>
                                <input type="text" name="bank_wallet" class="form-control @error('bank_wallet') is-invalid @enderror" value="{{ @old('bank_wallet') }}" autofocus>
                                @error('bank_wallet')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Atas Nama <span class="text-red">*</span></label>
                                <input type="text" name="atas_nama" class="form-control @error('atas_nama') is-invalid @enderror" value="{{ @old('atas_nama') }}">
                                @error('atas_nama')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Nomor Rekening <span class="text-red">* <sup class="font-italic">Jika E-Wallet masukkan nomor telephone</sup></span></label>
                                <input type="number" name="nomor_rekening" class="form-control @error('nomor_rekening') is-invalid @enderror" value="{{ @old('nomor_rekening') }}">
                                @error('nomor_rekening')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-paper-plane"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.bank-wallet.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endpush
