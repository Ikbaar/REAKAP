@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Kepemilikan Tanah dan Sejarah</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <section class="section-actions mb-3 d-flex justify-content-between flex-wrap gap-2">
        <a href="{{ route('admin.legalitas.create') }}" class="btn btn-outline-primary">
            <i class="bi bi-plus-circle"></i> Tambah Petani
        </a>
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Data...">
    </section>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Koperasi</th>
                <th>Total Kepemilikan Tanah dan Sejarah</th>
                <th>Tidak. Percils</th>
                <th>Luas Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_koperasi }}</td>
                <td>{{ $item->total_kepemilikan }}</td>
                <td>{{ $item->jumlah_percils }}</td>
                <td>{{ $item->luas_total }}</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('admin.lth.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-warning"
                                   data-bs-toggle="tooltip"
                                   data-bs-placement="top"
                                   title="Edit Data">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.lth.destroy', $item->id) }}"
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

