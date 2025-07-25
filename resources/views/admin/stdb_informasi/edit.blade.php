@extends('layouts.admin.app') {{-- ganti dengan layout yang kamu pakai --}}

@section('content')
<div class="container mt-4">
    <h2>Edit Informasi STDB</h2>

    <form action="{{ route('admin.stdb_informasi.update', $stdbInfo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_koperasi" class="form-label">Nama Koperasi</label>
            <input type="text" name="nama_koperasi" id="nama_koperasi" class="form-control" value="{{ old('nama_koperasi', $stdbInfo->nama_koperasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="formulir_selesai" class="form-label">Formulir Selesai</label>
            <input type="text" name="formulir_selesai" class="form-control" value="{{ old('formulir_selesai', $stdbInfo->formulir_selesai) }}">
        </div>

        <div class="mb-3">
            <label for="stdb_ke_disbun" class="form-label">STDB ke Disbun</label>
            <input type="text" name="stdb_ke_disbun" class="form-control" value="{{ old('stdb_ke_disbun', $stdbInfo->stdb_ke_disbun) }}">
        </div>

        <div class="mb-3">
            <label for="rilis_stdb" class="form-label">Rilis STDB</label>
            <input type="text" name="rilis_stdb" class="form-control" value="{{ old('rilis_stdb', $stdbInfo->rilis_stdb) }}">
        </div>

        <div class="mb-3">
            <label for="tidak_ada_ish" class="form-label">Tidak Ada ISH</label>
            <input type="text" name="tidak_ada_ish" class="form-control" value="{{ old('tidak_ada_ish', $stdbInfo->tidak_ada_ish) }}">
        </div>

        <div class="mb-3">
            <label for="tidak_ada_percils" class="form-label">Tidak Ada Percils</label>
            <input type="text" name="tidak_ada_percils" class="form-control" value="{{ old('tidak_ada_percils', $stdbInfo->tidak_ada_percils) }}">
        </div>

        <div class="mb-3">
            <label for="luas_total" class="form-label">Luas Total</label>
            <input type="number" name="luas_total" class="form-control" step="0.01" value="{{ old('luas_total', $stdbInfo->luas_total) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.stdb_informasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
