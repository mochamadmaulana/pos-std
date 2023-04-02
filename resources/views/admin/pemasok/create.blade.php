@extends('layouts.app', ['title' => 'Pemasok','icon' => 'fas fa-truck'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Form Tambah Produk</span>
                </h3>
                <a href="{{ route('admin.pemasok.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pemasok.store') }}" method="post">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Perusahaan <span class="text-red">*</span></label>
                                <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" value="{{ @old('perusahaan') }}" autofocus>
                                @error('perusahaan')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Pemilik <sup class="text-warning font-italic">Opsional</sup></label>
                                <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" value="{{ @old('pemilik') }}">
                                @error('pemilik')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Telepone <span class="text-red">*</span></label>
                                <div id="telepone">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6">
                                            <input type="text" name="jenis_telepone[]" class="form-control @error('jenis_telepone') is-invalid @enderror" placeholder="WhatsApp" value="{{ @old('jenis_telepone') }}" multiple="true">
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="input-group">
                                            <input type="number" name="telepone[]" class="form-control  @error('telepone') is-invalid @enderror" placeholder="083xxxxxxxx" value="{{ @old('telepone') }}" multiple="true">
                                                <div class="input-group-append">
                                                    <button class="btn btn-success" type="button" id="addTelepone"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @error('telepone')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Alamat <sup class="text-warning font-italic">Opsional</sup></label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="5" rows="5">{{ @old('alamat') }}</textarea>
                                @error('alamat')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
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
<li class="breadcrumb-item"><a href="{{ route('admin.pemasok.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Tambah Data</li>
@endpush

@push('js')
<script>
    $(document).ready(function() {
        $('#addTelepone').on('click', function(){
            var html = '';
            html += '<div class="row mt-3" id="row">';
            html += '<div class="col-lg-6 col-sm-6">';
            html += '<input type="text" name="jenis_telepone[]" placeholder="WhatsApp" class="form-control" multiple="true">';
            html += '</div>';
            html += '<div class="col-lg-6 col-sm-6">';
            html += '<div class="input-group">';
            html += '<input type="number" name="telepone[]" placeholder="083xxxxxxxxx" class="form-control" multiple="true">';
            html += '<div class="input-group-append">';
            html += '<button class="btn btn-danger" type="button" id="removeTelepone"><i class="fas fa-times"></i></button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#telepone').append(html);

            $(document).on('click','#removeTelepone',function(){
                $(this).closest('#row').remove();
            })
        })
    })
</script>
@endpush
