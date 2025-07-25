@extends('layouts.app')

@section('title', 'Data Legalitas')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Legalitas</h2>

    {{-- Search --}}
    <div class="mb-3 d-flex justify-content-end">
        <input type="text" id="searchInput" class="form-control w-auto" placeholder="Search Data...">
    </div>

    {{-- Tabel Data --}}
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 500px; overflow-y: auto; overflow-x: auto;">
                <table class="table table-bordered table-striped table-sm align-middle text-center mb-0">
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data legalitas.</td>
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
