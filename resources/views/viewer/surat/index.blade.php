@extends('layouts.viewer.app')

@section('title', 'Data Surat Pernyataan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Surat Pernyataan</h2>

    {{-- Search --}}
    <div class="d-flex justify-content-end mb-3">
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Cari...">
    </div>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Koperasi</th>
                    <th>Total Surat Pernyataan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_koperasi }}</td>
                        <td>{{ $item->total_surat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data surat pernyataan.</td>
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
