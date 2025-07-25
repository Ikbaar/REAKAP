<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Legalitas;


class LegalitasController extends Controller
{
    public function index() {
    $legalitas = Legalitas::all(); // pastikan model Legalitas udah ada
    return view('admin.legalitas.index', compact('legalitas'));
}

public function create() {
    return view('admin.legalitas.create');
}

public function store(Request $request) {
    Legalitas::create($request->all());
    return redirect()->route('admin.legalitas.index')->with('success', 'Data berhasil ditambahkan.');
}

public function edit($id) {
    $legalitas = Legalitas::findOrFail($id);
    return view('admin.legalitas.edit', compact('legalitas'));
}

public function update(Request $request, $id) {
    $legalitas = Legalitas::findOrFail($id);
    $legalitas->update($request->all());
    return redirect()->route('admin.legalitas.index')->with('success', 'Data berhasil diupdate.');
}

public function destroy($id) {
    $legalitas = Legalitas::findOrFail($id);
    $legalitas->delete();
    return redirect()->route('admin.legalitas.index')->with('success', 'Data berhasil dihapus.');
}

public function show($id) {
    $legalitas = Legalitas::findOrFail($id);
    return view('admin.legalitas.show', compact('legalitas'));
}

}
