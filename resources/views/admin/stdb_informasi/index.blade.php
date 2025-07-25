@extends('layouts.admin.app')

@section('title', 'Informasi STDB')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Informasi STDB</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <section class="section-actions mb-3 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.stdb_informasi.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Tambah Informasi STDB
        </a>
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Koperasi...">
    </section>

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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($infos as $info)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $info->nama_koperasi }}</td>
                    <td>{{ $info->formulir_selesai }}</td>
                    <td>{{ $info->stdb_ke_disbun }}</td>
                    <td>{{ $info->rilis_stdb }}</td>
                    <td>{{ $info->tidak_ada_ish }}</td>
                    <td>{{ $info->tidak_ada_percils }}</td>
                    <td>{{ $info->luas_total }} ha</td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.stdb_informasi.edit', $info->id) }}" class="btn btn-sm btn-outline-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="{{ route('admin.stdb_informasi.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">Belum ada data.</td>
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
