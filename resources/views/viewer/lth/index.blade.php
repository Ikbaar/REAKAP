@extends('layouts.viewer.app')

@section('content')
<div class="container mt-4">
    <h3>Kepemilikan Tanah dan Sejarah</h3>

    <section class="section-actions mb-3 d-flex justify-content-end flex-wrap gap-2">
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Data...">
    </section>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Koperasi</th>
                <th>Total Kepemilikan</th>
                <th>Jumlah Percils</th>
                <th>Luas Total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lths as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_koperasi }}</td>
                <td>{{ $item->total_kepemilikan }}</td>
                <td>{{ $item->jumlah_percils }}</td>
                <td>{{ $item->luas_total }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data.</td>
            </tr>
            @endforelse
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
