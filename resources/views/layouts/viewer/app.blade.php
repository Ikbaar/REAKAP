<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.viewer.head')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="layout-container">
        <div class="sidebar-fixed">
            @include('layouts.viewer.sidebar')
        </div>

        <div class="content-area">
            @include('layouts.viewer.navbar')

            <main class="content-scroll">
                @yield('content')
            </main>

            @include('layouts.viewer.footer')
        </div>
    </div>

    {{-- Script umum --}}
    @include('layouts.viewer.script')

    {{-- Script tambahan per halaman --}}
    @yield('scripts')
</body>
</html>
