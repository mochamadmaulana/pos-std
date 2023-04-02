@extends('layouts.app', ['title' => 'Pembelian','icon' => 'fas fa-shopping-bag'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Form Tambah</h3>
                <a href="{{ route('admin.pembelian.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pembelian.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Produk <span class="text-red">*</span></label>
                                <select name="produk" class="form-control @error('produk') is-invalid @enderror" id="selectProduk">
                                    <option value="">-Pilih-</option>
                                    @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" @if (@old('produk') == $produk->id) selected @endif>{{ $produk->nama }} - {{ $produk->pemasok->perusahaan }}</option>
                                    @endforeach
                                </select>
                                @error('produk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Metode Pembayaran <span class="text-red">*</span></label>
                                <select name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="selectMetodePembayaran">
                                    <option value="">-Pilih-</option>
                                    <option value="CASH" @if (@old('metode_pembayaran') == "CASH") selected @endif>CASH</option>
                                    <option value="COD" @if (@old('metode_pembayaran') == "COD") selected @endif>COD</option>
                                    <option value="TEMPO" @if (@old('metode_pembayaran') == "TEMPO") selected @endif>TEMPO</option>
                                </select>
                                @error('metode_pembayaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Termin Pembayaran <sup class="text-warning font-italic">Opsional</sup></label>
                                <select name="termin_pembayaran" class="form-control @error('termin_pembayaran') is-invalid @enderror" id="selectTerminPembayaran">
                                    <option value="">-Pilih-</option>
                                    @foreach ($termin_pembayarans as $termin_pembayaran)
                                    <option value="{{ $termin_pembayaran->id }}" @if (@old('termin_pembayaran') == $termin_pembayaran->id) selected @endif>{{ $termin_pembayaran->nama }}</option>
                                    @endforeach
                                </select>
                                @error('termin_pembayaran')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Harga <span class="text-red">*</span></label>
                                <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ @old('harga') }}" autofocus>
                                @error('harga')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
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
<li class="breadcrumb-item"><a href="{{ route('admin.pembelian.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#selectTerminPembayaran').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
        $('#selectMetodePembayaran').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
        $('#selectProduk').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
    })
</script>
@endpush
