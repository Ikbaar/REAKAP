@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Tambah Data Kepemilikan Tanah</h3>
    <form action="{{ route('admin.lth.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Koperasi</label>
            <input type="text" name="nama_koperasi" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Total Kepemilikan Tanah dan Sejarah</label>
            <textarea name="total_kepemilikan" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Tidak. Percils</label>
            <input type="number" name="jumlah_percils" class="form-control">
        </div>

        <div class="mb-3">
            <label>Luas Total</label>
            <input type="number" step="0.01" name="luas_total" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
