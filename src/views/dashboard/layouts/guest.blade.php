<!DOCTYPE html>
<html lang="{{ $locale }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $pageName??config('app.name') }}</title>

    <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    @stack('css')
</head>
<body class="hold-transition login-page">
@yield('content')
<!-- jQuery -->
<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
@stack('js')
</body>
</html>
