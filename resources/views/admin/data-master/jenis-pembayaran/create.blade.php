@extends('layouts.app', ['title' => 'Jenis Pembayaran','icon' => 'fas fa-server'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Form Tambah</span>
                </h3>
                <a href="{{ route('admin.data-master.jenis-pembayaran.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data-master.jenis-pembayaran.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama <span class="text-danger">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ @old('nama') }}" autofocus>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
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
<li class="breadcrumb-item"><a href="{{ route('admin.data-master.jenis-pembayaran.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endpush
