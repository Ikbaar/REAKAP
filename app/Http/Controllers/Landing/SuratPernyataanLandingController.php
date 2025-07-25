<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\SuratPernyataan; // Pastikan modelnya ada

class SuratPernyataanLandingController extends Controller
{
    public function index()
    {
        $surats = SuratPernyataan::all();
        return view('viewer.surat.index', compact('surats'));
    }
}
