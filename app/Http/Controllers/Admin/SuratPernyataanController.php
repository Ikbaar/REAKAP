<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuratPernyataan;


class SuratPernyataanController extends Controller
{

public function index()
{
    $data = SuratPernyataan::all();
    return view('admin.surat.index', compact('data'));
}

public function create()
{
    return view('admin.surat.create');
}

public function store(Request $request)
{
    $request->validate([
        'nama_koperasi' => 'required|string|max:255',
        'total_surat' => 'required|integer|min:0',
    ]);

    SuratPernyataan::create($request->all());

    return redirect()->route('admin.surat.index')->with('success', 'Data berhasil ditambahkan');
}

public function edit($id)
{
    $surat = SuratPernyataan::findOrFail($id);
    return view('admin.surat.edit', compact('surat'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama_koperasi' => 'required|string|max:255',
        'total_surat' => 'required|integer|min:0',
    ]);

    $surat = SuratPernyataan::findOrFail($id);
    $surat->update($request->all());

    return redirect()->route('admin.surat.index')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    SuratPernyataan::destroy($id);
    return redirect()->route('admin.surat.index')->with('success', 'Data berhasil dihapus');
}

}
