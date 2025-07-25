<?php


namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Petani;

class DashboardLandingController extends Controller
{
    public function index()
    {
        $totalPetani = Petani::count();
        $jumlahLengkap = Petani::whereNotNull('luas_legalitas')
            ->whereNotNull('legalitas')
            ->whereNotNull('nomor_legalitas')
            ->count();
        $jumlahBelumLengkap = $totalPetani - $jumlahLengkap;

        return view('viewer.dashboard', compact(
            'totalPetani',
            'jumlahLengkap',
            'jumlahBelumLengkap'
        ));
    }
}
