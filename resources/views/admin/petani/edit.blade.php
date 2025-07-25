@extends('layouts.admin.app')

@section('content')
<section class="edit-petani-page container">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Edit Data Petani</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.petani.update', $petani->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Full-width fields --}}
                <div class="mb-3">
                    <label>LandID</label>
                    <input type="text" name="landid_vbw" class="form-control" value="{{ $petani->landid_vbw }}">
                </div>

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $petani->name }}">
                </div>

                <div class="mb-3">
                    <label>Village</label>
                    <input type="text" name="village" class="form-control" value="{{ $petani->village }}">
                </div>

                {{-- Row 1 --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Legalitas</label>
                        <input type="text" name="legalitas" class="form-control" value="{{ $petani->legalitas }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>STDB</label>
                        <input type="text" name="stdb" class="form-control" value="{{ $petani->stdb }}">
                    </div>
                </div>

                {{-- Koordinat --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Point X</label>
                        <input type="text" name="point_x" class="form-control" value="{{ $petani->point_x }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Point Y</label>
                        <input type="text" name="point_y" class="form-control" value="{{ $petani->point_y }}">
                    </div>
                </div>

                {{-- Row 2 --}}
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>FKH548</label>
                        <input type="text" name="fkh548" class="form-control" value="{{ $petani->fkh548 }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Konsesi REA</label>
                        <input type="text" name="konsesirea" class="form-control" value="{{ $petani->konsesirea }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>WIUP</label>
                        <input type="text" name="wiup" class="form-control" value="{{ $petani->wiup }}">
                    </div>
                </div>

                {{-- Row 3 --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>IUPHHK HTI - HA</label>
                        <input type="text" name="iuphhk_hti_ha" class="form-control" value="{{ $petani->iuphhk_hti_ha }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nomor Legalitas</label>
                        <input type="text" name="nomor_legalitas" class="form-control" value="{{ $petani->nomor_legalitas }}">
                    </div>
                </div>

                <div class="d-flex justify-content-start mt-4">
                    <button class="btn btn-outline-success">Update</button>
                    <a href="{{ route('admin.petani.index') }}" class="btn btn-outline-warning ms-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
