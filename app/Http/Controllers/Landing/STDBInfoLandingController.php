<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\STDBInfo; // Pastikan modelnya ada

class STDBInfoLandingController extends Controller
{
    public function index()
    {
        $stdbs = STDBInfo::all();
        return view('viewer.stdb.index', compact('stdbs'));
    }
}
