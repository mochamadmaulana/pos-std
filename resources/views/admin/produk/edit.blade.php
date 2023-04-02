@extends('layouts.app', ['title' => 'Produk','icon' => 'fas fa-boxes'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">Form Edit</h3>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.produk.update', $produk->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" value="{{ $produk->kode }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Nama <span class="text-red">*</span></label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ $produk->nama }}" autofocus>
                                @error('nama')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Satuan <span class="text-red">*</span></label>
                                <select name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="selectSatuan">
                                    <option value="">-Pilih-</option>
                                    @foreach ($satuan_produks as $satuan)
                                    <option value="{{ $satuan->id }}" @if ($produk->satuan_id == $satuan->id) selected @endif>{{ $satuan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('satuan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Kategori <span class="text-red">*</span></label>
                                <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="selectKategori">
                                    <option value="">-Pilih-</option>
                                    @foreach ($kategori_produks as $kategori)
                                    <option value="{{ $kategori->id }}" @if ($produk->kategori_id == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Pemasok <span class="text-red">*</span></label>
                                <select name="pemasok" class="form-control @error('pemasok') is-invalid @enderror" id="selectPemasok">
                                    <option value="">-Pilih-</option>
                                    @foreach ($pemasoks as $pemasok)
                                    <option value="{{ $pemasok->id }}" @if ($produk->pemasok_id == $pemasok->id) selected @endif>{{ $pemasok->perusahaan }} - ({{ $pemasok->pemilik }})</option>
                                    @endforeach
                                </select>
                                @error('pemasok')<div class="invalid-feedback">{{ $message }}</span></div> @enderror
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
<li class="breadcrumb-item"><a href="{{ route('admin.produk.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Edit Data</li>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#selectSatuan').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
        $('#selectKategori').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
        $('#selectPemasok').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih-',
            // allowClear: true
        })
    })
</script>
@endpush
