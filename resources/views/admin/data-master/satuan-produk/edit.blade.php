@extends('layouts.app', ['title' => 'Satuan Produk','icon' => 'fas fa-server'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Form Edit</span>
                </h3>
                <a href="{{ route('admin.data-master.satuan-produk.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.data-master.satuan-produk.update', $satuan_produk->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama <span class="text-red">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $satuan_produk->nama }}" autofocus>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Deskripsi <sup class="text-warning font-italic">Opsional</sup></label>
                                <input type="text" name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{ $satuan_produk->deskripsi }}" autofocus>
                                @error('deskripsi')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input name="status" class="form-check-input" type="radio" value="1" id="aktif" @if($satuan_produk->status == 1) checked @endif/>
                                    <label class="form-check-label" for="aktif"> Aktif </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="status" class="form-check-input" type="radio" value="0" id="tidakAktif" @if($satuan_produk->status == 0) checked @endif/>
                                    <label class="form-check-label" for="tidakAktif"> Tidak Aktif </label>
                                </div>
                                @error('aktif')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-edit"></i> Update
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
<li class="breadcrumb-item"><a href="{{ route('admin.data-master.satuan-produk.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Edit Data</li>
@endpush
