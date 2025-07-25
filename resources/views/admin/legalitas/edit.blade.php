@extends('layouts.admin.app')

@section('title', 'Edit Legalitas')

@section('content')
<section class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Edit Legalitas</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.legalitas.update', $legalitas->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Koperasi --}}
                <div class="mb-3">
                    <label for="name_cooperatives" class="form-label">Name Cooperatives</label>
                    <input type="text" name="name_cooperatives" class="form-control" 
                           value="{{ old('name_cooperatives', $legalitas->name_cooperatives) }}" required>
                </div>

                {{-- Bidang Legalitas --}}
                @foreach (['shm', 'sppt', 'skpt', 'sklg', 'customary', 'skt', 'other'] as $field)
                    <div class="mb-3">
                        <label class="form-label text-uppercase">{{ strtoupper($field) }}</label>
                        <input type="number" name="{{ $field }}" class="form-control" min="0" 
                               value="{{ old($field, $legalitas->$field) }}" required>
                    </div>
                @endforeach

                <div class="d-flex justify-content-start mt-4">
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                    <a href="{{ route('admin.legalitas.index') }}" class="btn btn-outline-warning ms-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
