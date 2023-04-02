@extends('layouts.app', ['title' => 'Termin Pembayaran','icon' => 'fas fa-server'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span>List Data</span>
                </h3>
                <a href="{{ route('admin.data-master.termin-pembayaran.create') }}" class="btn btn-sm btn-primary float-right shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableTermin" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($termin_pembayarans as $termin_pembayaran)
                        <tr>
                            <td>{{ $termin_pembayaran->nama }}</td>
                            <td>{{ $termin_pembayaran->hari }} Hari</td>
                            <td>
                                @if ($termin_pembayaran->status == true)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td style="width: 20%">
                                <a href="{{ route('admin.data-master.termin-pembayaran.edit', $termin_pembayaran->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="far fa-edit"></i> edit</a>
                                <form action="{{ route('admin.data-master.termin-pembayaran.destroy', $termin_pembayaran->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger border-0 shadow-sm" onclick="return confirm('Yakin, untuk menghapus termin pembayaran : {{ $termin_pembayaran->nama }} ?')"><i class="far fa-trash-alt"></i> hapus</button>
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
      $('#tableTermin').DataTable({
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
