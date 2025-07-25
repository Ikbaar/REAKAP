@extends('layouts.app')

@section('title', 'Data Petani')

@section('content')
  <div class="container">
    <h2 class="mb-4">Data Petani</h2>
    
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-sm align-middle">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>LandID_VBW</th>
            <th>Name</th>
            <th>Koperasi</th>
            <th>YOP_VBW</th>
            <th>Village</th>
            <th>Luas Legalitas</th>
            <th>Luas SHP</th>
            <th>Legalitas</th>
            <th>STDB</th>
            <th>POINT_X</th>
            <th>POINT_Y</th>
            <th>FKH548</th>
            <th>KonsesiREA</th>
            <th>WIUP</th>
            <th>IUPHHK HTI - HA</th>
            <th>Nomor Legalitas</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($petanis as $index => $petani)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $petani->LandID_VBW }}</td>
              <td>{{ $petani->Name }}</td>
              <td>{{ $petani->Koperasi }}</td>
              <td>{{ $petani->YOP_VBW }}</td>
              <td>{{ $petani->Village }}</td>
              <td>{{ $petani->Luas_Legalitas }}</td>
              <td>{{ $petani->Luas_SHP }}</td>
              <td>{{ $petani->Legalitas }}</td>
              <td>{{ $petani->STDB }}</td>
              <td>{{ $petani->POINT_X }}</td>
              <td>{{ $petani->POINT_Y }}</td>
              <td>{{ $petani->FKH548 }}</td>
              <td>{{ $petani->KonsesiREA }}</td>
              <td>{{ $petani->WIUP }}</td>
              <td>{{ $petani->IUPHHK_HTI_HA }}</td>
              <td>{{ $petani->Nomor_Legalitas }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
