@extends('layouts.admin.app')

@section('title', 'Edit Surat Pernyataan')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Surat Pernyataan</h2>

    <form action="{{ route('admin.surat.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
            <input type="text" name="nama_koperasi" id="nama_koperasi"
                   class="form-control" value="{{ old('nama_koperasi', $surat->nama_koperasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="total_surat" class="form-label">Total Surat Pernyataan</label>
            <input type="number" name="total_surat" id="total_surat"
                   class="form-control" value="{{ old('total_surat', $surat->total_surat) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('admin.surat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
