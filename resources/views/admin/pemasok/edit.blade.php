@extends('layouts.app', ['title' => 'Pemasok','icon' => 'fas fa-truck'])

@section('content')

<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Form Edit Produk</span>
                </h3>
                <a href="{{ route('admin.pemasok.index') }}" class="btn btn-sm btn-secondary float-right shadow-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.pemasok.update', $pemasok->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Perusahaan <span class="text-red">*</span></label>
                                <input type="text" name="perusahaan" class="form-control @error('perusahaan') is-invalid @enderror" value="{{ $pemasok->perusahaan }}" autofocus>
                                @error('perusahaan')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Pemilik <sup class="text-warning font-italic">Opsional</sup></label>
                                <input type="text" name="pemilik" class="form-control @error('pemilik') is-invalid @enderror" value="{{ $pemasok->pemilik }}">
                                @error('pemilik')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label>Telepone <span class="text-red">*</span></label>
                                @foreach($pemasok->telepone_pemasok as $telepone)
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" class="form-control" value="{{ $telepone->nama }}" readonly>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ $telepone->nomor }}" readonly>
                                            <div class="input-group-append">
                                                <a href="{{ route('admin.telepone_pemasok.delete',$telepone->id) }}" onclick="return confirm('Yakin, untuk menghapus {{ $telepone->nama }} ({{ $telepone->nomor }}) ?')" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <button type="button" class="btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#addTeleponeModal">
                                <i class="fas fa-plus"></i> Telepone
                                </button>
                            </div>

                            <div class="form-group">
                                <label>Alamat <sup class="text-warning font-italic">Opsional</sup></label>
                                <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="5" rows="5">{{ $pemasok->alamat }}</textarea>
                                @error('alamat')<div class="invalid-feedback">{{ $message }}</span></div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status <span class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <input name="status" class="form-check-input" type="radio" value="1" id="aktif" @if($pemasok->status == 1) checked @endif/>
                                    <label class="form-check-label" for="aktif"> Aktif </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input name="status" class="form-check-input" type="radio" value="0" id="tidakAktif" @if($pemasok->status == 0) checked @endif/>
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

@push('modal')
<div class="modal fade" id="addTeleponeModal" tabindex="-1" aria-labelledby="addTeleponeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeleponeModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.telepone_pemasok.add',$pemasok->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div id="telepone">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <label>Nama <span class="text-danger">*</span></label>
                                <input type="text" name="jenis_telepone[]" class="form-control @error('jenis_telepone') is-invalid @enderror" placeholder="WhatsApp" value="{{ @old('jenis_telepone') }}" multiple="true">
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <label>Nomor <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" name="telepone[]" class="form-control  @error('telepone') is-invalid @enderror" placeholder="083xxxxxxxx" value="{{ @old('telepone') }}" multiple="true">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="button" id="addTelepone"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush

@push('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.pemasok.index') }}">List Data</a></li>
<li class="breadcrumb-item active">Edit Data</li>
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
