<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Legalitas; // <- INI YANG KURANG

class LegalitasLandingController extends Controller
{
    public function index()
    {
        $legalitas = Legalitas::all();
        return view('viewer.legalitas.index', compact('legalitas'));
    }
}
