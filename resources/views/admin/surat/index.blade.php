@extends('layouts.admin.app')

@section('title', 'Data Surat Pernyataan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Surat Pernyataan</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('admin.surat.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Cari...">
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Koperasi</th>
                    <th>Total Surat Pernyataan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_koperasi }}</td>
                        <td>{{ $item->total_surat }}</td>
                        <td class="d-flex justify-content-center gap-2">
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('admin.surat.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-warning"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Edit Data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.surat.destroy', $item->id) }}"
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
                    <tr><td colspan="4" class="text-center">Tidak ada data.</td></tr>
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

