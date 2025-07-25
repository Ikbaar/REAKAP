<div class="sidebar sidebar-custom p-3">
    <div class="d-flex align-items-center gap-2 mb-2">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 50px; height: 50px;">
        <h4 class="mb-0 text-white">SI Petani</h4>
    </div>

    <div class="d-flex align-items-center mt-2 mb-3 text-white small" style="gap: 8px;">
        <i class="bi bi-person-circle fs-5"></i>
        <span>Halo, <strong>{{ auth()->user()->username }}</strong></span>
    </div>

    <hr class="bg-light">

    <form method="POST" action="{{ route('logout') }}" class="mb-3">
        @csrf
        <button class="btn btn-outline-danger w-100" type="submit">
            <i class="bi bi-box-arrow-right me-2"></i>Logout
        </button>
    </form>

    <nav class="nav flex-column gap-1">
        <a href="{{ route('viewer.dashboard') }}" class="nav-link {{ request()->routeIs('viewer.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </a>

        <a href="{{ route('viewer.petani.index') }}" class="nav-link {{ request()->routeIs('viewer.petani.index') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>Data Petani
        </a>

        <a href="{{ route('viewer.legalitas.index') }}" class="nav-link {{ request()->routeIs('viewer.legalitas.index') ? 'active' : '' }}">
            <i class="bi bi-journal-text me-2"></i>Legalitas
        </a>

        <a href="{{ route('viewer.surat.index') }}" class="nav-link {{ request()->routeIs('viewer.surat.index') ? 'active' : '' }}">
            <i class="bi bi-image me-2"></i>Surat Pernyataan
        </a>

        <a href="{{ route('viewer.lth.index') }}" class="nav-link {{ request()->routeIs('viewer.lth.index') ? 'active' : '' }}">
            <i class="bi bi-map me-2"></i>Land Tenure & History
        </a>

        <a href="{{ route('viewer.stdb.index') }}" class="nav-link {{ request()->routeIs('viewer.stdb.index') ? 'active' : '' }}">
            <i class="bi bi-info-circle me-2"></i>Informasi STDB
        </a>
    </nav>
</div>
