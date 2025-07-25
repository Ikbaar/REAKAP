<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\LTH; // Pastikan modelnya ada

class LthLandingController extends Controller
{
    public function index()
    {
        $lths = LTH::all();
        return view('viewer.lth.index', compact('lths'));
    }
}
