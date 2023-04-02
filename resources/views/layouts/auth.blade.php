<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login &mdash; {{ env('APP_NAME') ?? 'APP STD' }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/backend') }}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo text-center">
            <a href="#"><img src="{{ asset('assets') }}/logo/logo_std.png" alt="AdminLTE Logo" class="brand-image" height="50%" width="50%"></a>
            {{-- <h4><a href="#"><b>PT.</b> Sinar Timur Darmawan</a></h4> --}}
        </div>
        @yield('content')
    </div>

    <script src="{{ asset('assets/backend') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/backend') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('assets/backend') }}/plugins/toastr/toastr.min.js"></script>

    @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}')
            });
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}')
            });
        </script>
    @endif
</body>

</html>
