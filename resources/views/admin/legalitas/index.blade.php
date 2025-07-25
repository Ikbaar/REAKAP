@extends('layouts.admin.app')

@section('title', 'Data Legalitas')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Legalitas</h2>

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Section: Tambah & Search --}}
    <section class="section-actions mb-3 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.legalitas.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Tambah Petani
        </a>
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Data...">
    </section>

    {{-- Tabel Data --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Name Cooperatives</th>
                    <th>SHM</th>
                    <th>SPPT</th>
                    <th>SKPT</th>
                    <th>SKLG</th>
                    <th>Customary Land</th>
                    <th>SKT</th>
                    <th>Other</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($legalitas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name_cooperatives }}</td>
                        <td>{{ $item->shm }}</td>
                        <td>{{ $item->sppt }}</td>
                        <td>{{ $item->skpt }}</td>
                        <td>{{ $item->sklg }}</td>
                        <td>{{ $item->customary }}</td>
                        <td>{{ $item->skt }}</td>
                        <td>{{ $item->other }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('admin.legalitas.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-warning"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Edit Data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.legalitas.destroy', $item->id) }}"
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
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data legalitas.</td>
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
        const rows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("keyup", function () {
            const keyword = this.value.toLowerCase();
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(keyword) ? "" : "none";
            });
        });
    });
</script>
@endsection

