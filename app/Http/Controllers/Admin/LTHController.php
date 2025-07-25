<?php

namespace App\Http\Controllers\Admin;

use App\Models\LTH;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class LTHController extends Controller
{
    public function index()
    {
        $data = LTH::all();
        return view('admin.lth.index', compact('data'));
    }

    public function create()
    {
        return view('admin.lth.create');
    }

    public function store(Request $request)
    {
        LTH::create($request->all());
        return redirect()->route('admin.lth.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $lth = LTH::findOrFail($id);
        return view('admin.lth.edit', compact('lth'));
    }

    public function update(Request $request, $id)
    {
        $lth = LTH::findOrFail($id);
        $lth->update($request->all());
        return redirect()->route('admin.lth.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        LTH::findOrFail($id)->delete();
        return redirect()->route('admin.lth.index')->with('success', 'Data berhasil dihapus');
    }
}
