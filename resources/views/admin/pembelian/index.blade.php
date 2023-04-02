@extends('layouts.app', ['title' => 'Pembelian','icon' => 'fas fa-shopping-bag'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Data Pembelian</span>
                </h3>
                <a href="{{ route('admin.pembelian.create') }}" class="btn btn-sm btn-primary float-right shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablePembelian" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Metode Pembayaran</th>
                            <th>Termin</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pembelians as $pembelian)
                        <tr>
                            <td>{{ $pembelian->produk->nama }}</td>
                            <td>{{ $pembelian->metode_pembayaran }}</td>
                            <td>{{ $pembelian->termin_pembayaran->nama }}</td>
                            <td>{{ $pembelian->quantity }}</td>
                            <td>Rp. {{ $pembelian->harga }}</td>
                            <td>Rp. {{ $pembelian->total_harga }}</td>
                            <td>
                                <a href="{{ route('admin.pembelian.edit', $pembelian->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="far fa-edit"></i> edit</a>
                                <form action="{{ route('admin.pembelian.destroy', $pembelian->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger border-0 shadow-sm" onclick="return confirm('Yakin, untuk menghapus produk : {{ $pembelian->nama }} ({{ $pembelian->pemasok->perusahaan }}) ?')"><i class="far fa-trash-alt"></i> hapus</button>
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
      $('#tablePembelian').DataTable({
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
