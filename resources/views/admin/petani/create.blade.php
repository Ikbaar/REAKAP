@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Petani</h2>

    <form action="{{ route('admin.petani.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>LandID</label>
            <input type="text" name="landid_vbw" class="form-control">
        </div>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label>Village</label>
            <input type="text" name="village" class="form-control">
        </div>

        <div class="mb-3">
            <label>Legalitas</label>
            <input type="text" name="legalitas" class="form-control">
        </div>

        <div class="mb-3">
            <label>STDB</label>
            <input type="text" name="stdb" class="form-control">
        </div>

        <button class="btn btn-outline-primary">Simpan</button>
        <a href="{{ route('admin.petani.index') }}" class="btn btn-secondary ms-2">Kembali</a>

    </form>
</div>
@endsection
