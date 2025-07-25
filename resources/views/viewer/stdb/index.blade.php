@extends('layouts.viewer.app') {{-- Ganti ini sesuai layout landing-mu --}}

@section('title', 'Informasi STDB')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Informasi STDB</h2>

    <input type="text" id="searchInput" class="form-control mb-3 w-auto" placeholder="Cari Koperasi...">

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Koperasi</th>
                    <th>Formulir Selesai</th>
                    <th>STDB ke Disbun</th>
                    <th>Rilis STDB</th>
                    <th>Tidak Ada ISH</th>
                    <th>Tidak Ada Percils</th>
                    <th>Luas Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stdbs as $info)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $info->nama_koperasi }}</td>
                    <td>{{ $info->formulir_selesai }}</td>
                    <td>{{ $info->stdb_ke_disbun }}</td>
                    <td>{{ $info->rilis_stdb }}</td>
                    <td>{{ $info->tidak_ada_ish }}</td>
                    <td>{{ $info->tidak_ada_percils }}</td>
                    <td>{{ $info->luas_total }} ha</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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
