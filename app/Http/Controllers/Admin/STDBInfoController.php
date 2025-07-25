<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\STDBInfo;


class STDBInfoController extends Controller
{
    public function index()
    {
        $infos = STDBInfo::all();
        return view('admin.stdb_informasi.index', compact('infos'));
    }

    public function create()
    {
        return view('admin.stdb_informasi.create'); // bisa kosong dulu, tergantung kamu mau pake view atau langsung push
    }

    public function store(Request $request)
    {
        STDBInfo::create([
            'nama_koperasi' => $request->nama_koperasi,
            'formulir_selesai' => $request->formulir_selesai,
            'stdb_ke_disbun' => $request->stdb_ke_disbun,
            'rilis_stdb' => $request->rilis_stdb,
            'tidak_ada_ish' => $request->tidak_ada_ish,
            'tidak_ada_percils' => $request->tidak_ada_percils,
            'luas_total' => $request->luas_total,
        ]);

        return redirect()->route('admin.stdb_informasi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $stdbInfo = STDBInfo::findOrFail($id);
        return view('admin.stdb_informasi.edit', compact('stdbInfo')); // ✅ ini benar

    }

    public function update(Request $request, $id)
    {
        $info = STDBInfo::findOrFail($id);
        $info->update([
            'nama_koperasi' => $request->nama_koperasi,
            'formulir_selesai' => $request->formulir_selesai,
            'stdb_ke_disbun' => $request->stdb_ke_disbun,
            'rilis_stdb' => $request->rilis_stdb,
            'tidak_ada_ish' => $request->tidak_ada_ish,
            'tidak_ada_percils' => $request->tidak_ada_percils,
            'luas_total' => $request->luas_total,
        ]);

        return redirect()->route('admin.stdb_informasi.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $info = STDBInfo::findOrFail($id);
        $info->delete();

        return redirect()->route('admin.stdb_informasi.index')->with('success', 'Data berhasil dihapus');
    }
}
