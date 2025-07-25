<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.admin.head')

    {{-- Tambahkan ini supaya halaman bisa menambahkan stylesheet tambahan seperti Leaflet --}}
    @yield('head')

    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    
    
    
</head>


<body>
    <div class="layout-container">
        <div class="sidebar-fixed">
            @include('layouts.admin.sidebar')
        </div>

        <div class="content-area">
            @include('layouts.admin.navbar')

            <main class="content-scroll">
                @yield('content')
            </main>

            @include('layouts.admin.footer')
        </div>
    </div>

    {{-- Script umum --}}
    @include('layouts.admin.script')

    {{-- Script tambahan per halaman --}}
    @yield('scripts')
</body>
</html>
