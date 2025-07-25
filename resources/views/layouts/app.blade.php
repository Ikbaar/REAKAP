<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $layoutPrefix = Auth::user()->role === 'admin' ? 'layouts.admin.' : 'layouts.viewer.';
    @endphp

    @include($layoutPrefix . 'head')

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="layout-container">
        <div class="sidebar-fixed">
            @include($layoutPrefix . 'sidebar')
        </div>

        <div class="content-area">
            @include($layoutPrefix . 'navbar')

            <main class="content-scroll">
                @yield('content')
            </main>

            @include($layoutPrefix . 'footer')
        </div>
    </div>

    {{-- Script umum --}}
    @include($layoutPrefix . 'script')

    {{-- Script tambahan per halaman --}}
    @yield('scripts')
</body>
</html>
