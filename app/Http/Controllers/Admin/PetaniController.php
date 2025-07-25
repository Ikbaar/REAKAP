<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petani;
use App\Imports\PetaniImport;
use Maatwebsite\Excel\Facades\Excel;

class PetaniController extends Controller
{
    public function index()
{
    $petanis = Petani::all(); // atau paginate()
    return view('admin.petani.index', compact('petanis'));
}


    public function import(Request $request)
{
    Excel::import(new PetaniImport, $request->file('file'));

    return redirect()->back()->with('success', 'Data berhasil diimport tanpa duplikasi!');
}


    public function create()
    {
        return view('admin.petani.create');
    }

    public function store(Request $request)
    {
        Petani::create($request->all());
        return redirect()->route('admin.petani.index')->with('success', 'Data petani berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $petani = Petani::findOrFail($id);
        return view('admin.petani.edit', compact('petani'));
    }

    public function update(Request $request, $id)
    {
        $petani = Petani::findOrFail($id);
        $petani->update($request->all());
        return redirect()->route('admin.petani.index')->with('success', 'Data petani berhasil diupdate!');
    }

    public function destroy($id)
    {
        $petani = Petani::findOrFail($id);
        $petani->delete();
        return redirect()->route('admin.petani.index')->with('success', 'Data petani berhasil dihapus!');
    }

    public function show($id)
    {
        $petani = Petani::findOrFail($id);
        return view('admin.petani.detail', compact('petani'));
    }
    
public function showAllKoordinat()
{
    $petanis = Petani::all(); // ambil semua data petani dari database

    return view('admin.petani.map', compact('petanis'));
}




    

}
