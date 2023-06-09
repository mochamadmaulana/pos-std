@extends('layouts.app', ['title' => 'Dashboard','icon' => 'fas fa-home'])

@section('content')
<div class="jumbotron">
    <h1 class="display-5">Hallo, {{ Auth::user()->nama ?? 'Jabatan'}}</h1>
    <p class="lead">Selamat datang dan selamat beraktifitas kembali <b class="font-italic">Mochamad Maulana,...</b></p>
    <hr class="my-4">

    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-envelope-open-text"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Surat Masuk</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Surat Keluar</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>

        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number">0</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
