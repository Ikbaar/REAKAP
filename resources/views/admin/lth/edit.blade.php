@extends('layouts.admin.app')

@section('content')
<div class="container mt-4">
    <h3>Edit Data Kepemilikan Tanah</h3>
    <form action="{{ route('admin.lth.update', $lth->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Koperasi</label>
            <input type="text" name="nama_koperasi" class="form-control" value="{{ $lth->nama_koperasi }}" required>
        </div>

        <div class="mb-3">
            <label>Total Kepemilikan Tanah dan Sejarah</label>
            <textarea name="total_kepemilikan" class="form-control" required>{{ $lth->total_kepemilikan }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tidak. Percils</label>
            <input type="number" name="jumlah_percils" class="form-control" value="{{ $lth->jumlah_percils }}">
        </div>

        <div class="mb-3">
            <label>Luas Total</label>
            <input type="number" step="0.01" name="luas_total" class="form-control" value="{{ $lth->luas_total }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
