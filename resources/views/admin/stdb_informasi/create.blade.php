@extends('layouts.admin.app')

@section('content')
<div class="container">
    <h2>Tambah Data STDB</h2>
    <form action="{{ route('admin.stdb_informasi.store') }}" method="POST">
        <form action="{{ route('admin.stdb_informasi.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
        <input type="text" name="nama_koperasi" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="formulir_selesai" class="form-label">Formulir Selesai</label>
        <input type="text" name="formulir_selesai" class="form-control">
    </div>

    <div class="mb-3">
        <label for="stdb_ke_disbun" class="form-label">STDB ke Disbun</label>
        <input type="text" name="stdb_ke_disbun" class="form-control">
    </div>

    <div class="mb-3">
        <label for="rilis_stdb" class="form-label">Rilis STDB</label>
        <input type="text" name="rilis_stdb" class="form-control">
    </div>

    <div class="mb-3">
        <label for="tidak_ada_ish" class="form-label">Tidak Ada ISH</label>
        <input type="text" name="tidak_ada_ish" class="form-control">
    </div>

    <div class="mb-3">
        <label for="tidak_ada_percils" class="form-label">Tidak Ada Percils</label>
        <input type="text" name="tidak_ada_percils" class="form-control">
    </div>

    <div class="mb-3">
        <label for="luas_total" class="form-label">Luas Total</label>
        <input type="number" step="0.01" name="luas_total" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>

    </form>
</div>
@endsection
