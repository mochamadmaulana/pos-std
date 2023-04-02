@extends('layouts.app', ['title' => 'Bank/Wallet','icon' => 'fas fa-credit-card'])

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <span>List Data</span>
                </h3>
                <a href="{{ route('admin.bank-wallet.create') }}" class="btn btn-sm btn-primary float-right shadow-sm"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableProduk" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Bank/Wallet</th>
                            <th>Atas Nama</th>
                            <th>Nomor Rekening</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank_wallets as $bank_wallet)
                        <tr>
                            <td>{{ $bank_wallet->bank_wallet }}</td>
                            <td>{{ $bank_wallet->atas_nama }}</td>
                            <td>{{ $bank_wallet->nomor_rekening }}</td>
                            <td>
                                <a href="{{ route('admin.bank-wallet.edit', $bank_wallet->id) }}" class="btn btn-xs btn-success mr-2 shadow-sm"><i class="far fa-edit"></i> edit</a>
                                <form action="{{ route('admin.bank-wallet.destroy', $bank_wallet->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger border-0 shadow-sm" onclick="return confirm('Yakin, untuk menghapus bank/wallet : {{ $bank_wallet->bank_wallet }} ({{ $bank_wallet->atas_nama .' - '. $bank_wallet->nomor_rekening}}) ?')"><i class="far fa-trash-alt"></i> hapus</button>
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
