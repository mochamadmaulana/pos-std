@extends('layouts.auth')

@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Login untuk masuk aplikasi</p>

            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email_username" class="form-control @error('email_username') is-invalid @enderror" value="{{ @old('email_username') }}" placeholder="Username/Email" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('email_username') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block" ><i class="fas fa-sign-in-alt mr-2" ></i> Login</button>
                    </div>
                </div>
            </form>

            {{-- <div class="text-center mt-3">
                <p class="mb-1">
                    <a href="forgot-password.html">Lupa password...</a>
                </p>
            </div> --}}
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
