@extends('layouts.app', ['title' => 'Produk','icon' => 'fas fa-boxes'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Data Produk</span>
                </h3>
                <a href="{{ route('admin.produk.create') }}" class="btn btn-sm btn-primary float-right shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableProduk" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Pemasok</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->kode }}</td>
                            <td>{{ $produk->nama }}</td>
                            <td>{{ $produk->satuan->nama }}</td>
                            <td>{{ $produk->kategori->nama }}</td>
                            <td>{{ $produk->pemasok->perusahaan }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>
                                <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="far fa-edit"></i> edit</a>
                                <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger border-0 shadow-sm" onclick="return confirm('Yakin, untuk menghapus produk : {{ $produk->nama }} ({{ $produk->pemasok->perusahaan }}) ?')"><i class="far fa-trash-alt"></i> hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('breadcrumb')
<li class="breadcrumb-item active">List Data</li>
@endpush

@push('js')
<script>
    $(function () {
      $('#tableProduk').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>
@endpush
