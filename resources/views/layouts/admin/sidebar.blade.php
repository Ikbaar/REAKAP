<div class="sidebar sidebar-custom p-3">
    <div class="d-flex align-items-center gap-2 mb-2">
        
        <h4 class="mb-0 text-white">SI Petani</h4>
    </div>

    <div class="dropdown mt-2 mb-3">
    <button class="btn btn-outline-light dropdown-toggle w-100 text-start" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-person-circle me-2"></i>
        <span>Halo, <strong>{{ auth()->user()->username }}</strong>    </button>
    <ul class="dropdown-menu w-100 shadow">
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item text-danger" type="submit">
                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                </button>
            </form>
        </li>
        <div class="d-flex align-items-center gap-2 mt-3 ms-2">
            <div class="form-check form-switch m-0">
                <input class="form-check-input" type="checkbox" id="darkModeSwitch">
            </div>
            <i class="bi" id="themeIcon"></i>
        </div>
        



    </ul>
</div>



    <nav class="nav flex-column gap-1">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2 me-2"></i>Dashboard
        </a>
        <a href="{{ route('admin.petani.index') }}" class="nav-link {{ request()->routeIs('admin.petani.index') ? 'active' : '' }}">
            <i class="bi bi-people me-2"></i>Data Petani
        </a>
        <a href="{{ route('admin.legalitas.index') }}" class="nav-link {{ request()->routeIs('admin.legalitas.index') ? 'active' : '' }}">
            <i class="bi bi-journal-text me-2"></i>Legalitas
        </a>
        <a href="{{ route('admin.surat.index') }}" class="nav-link {{ request()->routeIs('admin.surat.index') ? 'active' : '' }}">
            <i class="bi bi-image me-2"></i>Surat Pernyataan
        </a>
        <a href="{{ route('admin.lth.index') }}" class="nav-link {{ request()->routeIs('admin.lth.create') ? 'active' : '' }}">
            <i class="bi bi-map me-2"></i>Land Tenure & History
        </a>
        <a href="{{ route('admin.stdb_informasi.index') }}" class="nav-link {{ request()->routeIs('admin.stdb_informasi.index') ? 'active' : '' }}">
            <i class="bi bi-info-circle me-2"></i>STDB Informasi
        </a>

    </nav>
</div>
