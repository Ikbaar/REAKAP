@extends('layouts.viewer.app')

@section('title', 'Data Petani')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Petani</h2>

    {{-- Tombol View Semua Peta --}}
    <a href="{{ route('viewer.petani.map') }}" class="btn btn-outline-secondary mb-3">
        <i class="bi bi-geo-alt"></i> View All Koordinat
    </a>

    {{-- Search --}}
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Search Data...">
    </div>

    {{-- Tabel Data --}}
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
                <table class="table table-bordered table-striped align-middle text-center mb-0">
                    <thead>
                        <tr>
                            <th>Land ID</th>
                            <th>Name</th>
                            <th>Koperasi</th>
                            <th>YOP</th>
                            <th>Village</th>
                            <th>Luas Legalitas</th>
                            <th>Luas SHP</th>
                            <th>Legalitas</th>
                            <th>STDB</th>
                            <th>POINT X</th>
                            <th>POINT Y</th>
                            <th>FKH548</th>
                            <th>Konsesi REA</th>
                            <th>WIUP</th>
                            <th>IUPHHK HTI - HA</th>
                            <th>Nomor Legalitas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($petanis as $petani)
                            <tr>
                                <td>{{ $petani->landid_vbw }}</td>
                                <td>{{ $petani->name }}</td>
                                <td>{{ $petani->koperasi }}</td>
                                <td>{{ $petani->yop_vbw }}</td>
                                <td>{{ $petani->village }}</td>
                                <td>{{ $petani->luas_legalitas }}</td>
                                <td>{{ $petani->luas_shp }}</td>
                                <td>{{ $petani->legalitas }}</td>
                                <td>{{ $petani->stdb }}</td>
                                <td>{{ $petani->point_x }}</td>
                                <td>{{ $petani->point_y }}</td>
                                <td>{{ $petani->fkh548 }}</td>
                                <td>{{ $petani->konsesirea }}</td>
                                <td>{{ $petani->wiup }}</td>
                                <td>{{ $petani->iuphhk_hti_ha }}</td>
                                <td>{{ $petani->nomor_legalitas }}</td>
                                <td>
                                    <a href="{{ route('viewer.petani.detail', $petani->id) }}"
                                       class="btn btn-sm btn-outline-info"
                                       data-bs-toggle="tooltip"
                                       data-bs-placement="top"
                                       title="Lihat Detail Peta">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="17">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const searchInput = document.getElementById("searchInput");
        const tableRows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("keyup", function () {
            const filter = searchInput.value.toLowerCase();
            tableRows.forEach(function (row) {
                const rowText = row.innerText.toLowerCase();
                row.style.display = rowText.includes(filter) ? "" : "none";
            });
        });
    });
</script>
@endsection
