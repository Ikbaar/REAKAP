{{-- resources/views/layouts/auth.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Login – SI Petani REAKAP')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">

    {{-- Auth-specific CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="auth">

    @yield('content')

</body>
</html>
