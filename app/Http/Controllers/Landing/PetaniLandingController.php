<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Petani;

class PetaniLandingController extends Controller
{
    public function index()
    {
        $petanis = Petani::all();
        return view('viewer.petani.index', compact('petanis'));
    }

    public function showAllKoordinat()
    {
        $petanis = Petani::whereNotNull('point_x')
                         ->whereNotNull('point_y')
                         ->get();

        return view('viewer.petani.map', compact('petanis'));
    }

    public function show($id)
    {
        $petani = Petani::findOrFail($id);
        return view('viewer.petani.detail', compact('petani'));
    }
}
