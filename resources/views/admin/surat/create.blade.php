@extends('layouts.admin.app')

@section('title', 'Tambah Surat Pernyataan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Surat Pernyataan</h2>

    <form action="{{ route('admin.surat.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
            <input type="text" name="nama_koperasi" id="nama_koperasi"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="total_surat" class="form-label">Total Surat Pernyataan</label>
            <input type="number" name="total_surat" id="total_surat"
                   class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('admin.surat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
