@extends('layouts.app', ['title' => 'Pemasok','icon' => 'fas fa-truck'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span>Data Pemasok</span>
                </h3>
                <a href="{{ route('admin.pemasok.create') }}" class="btn btn-sm btn-primary float-right shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tablePemasok" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Perusahaan</th>
                            <th>Pemilik</th>
                            <th>Telepone</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasoks as $pemasok)
                        <tr>
                            <td>{{ $pemasok->perusahaan }}</td>
                            <td>{{ $pemasok->pemilik }}</td>
                            <td>
                                <ol>
                                    @foreach($pemasok->telepone_pemasok as $telepone)
                                    <li>{{ $telepone->nama }} ({{ $telepone->nomor }})</li>
                                    @endforeach
                                </ol>
                            </td>
                            <td>{{ $pemasok->alamat }}</td>
                            <td>
                                @if ($pemasok->status == true)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Tidak Aktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.pemasok.edit', $pemasok->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="far fa-edit"></i> edit</a>
                                <form action="{{ route('admin.pemasok.destroy', $pemasok->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger border-0 shadow-sm" onclick="return confirm('Yakin, untuk menghapus pemasok {{ $pemasok->perusahaan }} ?')"><i class="far fa-trash-alt"></i> hapus</button>
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
      $('#tablePemasok').DataTable({
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
