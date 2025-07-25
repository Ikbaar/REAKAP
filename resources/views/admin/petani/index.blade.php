@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Petani</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Section: Import Excel --}}
    <section class="section-import mb-4">
        <form action="{{ route('admin.petani.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="file" name="file" class="form-control" required>
                <button class="btn btn-outline-success" type="submit">
                    <i class="bi bi-file-earmark-spreadsheet-fill"></i> Import Excel
                </button>
            </div>
        </form>
    </section>

    <a href="{{ route('admin.petani.map') }}" class="btn btn-outline-secondary">
        <i class="bi bi-geo-alt"></i> View All Koordinat
    </a>



    {{-- Section: Tambah Petani & Search --}}
    <section class="section-actions mb-3 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.petani.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Tambah Petani
        </a>
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Data...">
    </section>

    {{-- Section: Tabel Data --}}
    <section class="section-table">
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
                            @foreach ($petanis as $petani)
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
                                        <div class="d-flex justify-content-center gap-2">

                                            {{-- Show --}}

                                            <a href="{{ route('admin.petani.detail', $petani->id) }}"
                                                class="btn btn-sm btn-outline-info"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title="Lihat Detail Peta">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            {{-- Edit --}}
                                            <a href="{{ route('admin.petani.edit', $petani->id) }}"
                                               class="btn btn-sm btn-outline-warning"
                                               data-bs-toggle="tooltip"
                                               data-bs-placement="top"
                                               title="Edit Data">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                        

                                            {{-- Delete --}}
                                            <form action="{{ route('admin.petani.destroy', $petani->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Delete Data">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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
