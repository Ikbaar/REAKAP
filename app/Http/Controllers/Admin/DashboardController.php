<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petani;
use App\Models\Legalitas;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index()
{
    $totalPetani = Petani::count();
    $jumlahLengkap = Petani::whereNotNull('luas_legalitas')
        ->whereNotNull('legalitas')
        ->whereNotNull('nomor_legalitas')
        ->count();
    $jumlahBelumLengkap = $totalPetani - $jumlahLengkap;

    
$legalitasPerKoperasi = Legalitas::select(
    'name_cooperatives',
    DB::raw('
        SUM(COALESCE(shm, 0) + COALESCE(sppt, 0) + COALESCE(skpt, 0) + 
            COALESCE(sklg, 0) + COALESCE(customary, 0) + COALESCE(skt, 0) + 
            COALESCE(other, 0)
        ) as total_legalitas
    ')
)
->groupBy('name_cooperatives')
->get();

$labelsKoperasi = $legalitasPerKoperasi->pluck('name_cooperatives')->toArray();
$dataKoperasi = $legalitasPerKoperasi->pluck('total_legalitas')->toArray();


    return view('admin.dashboard', compact(
        'totalPetani',
        'jumlahLengkap',
        'jumlahBelumLengkap',
        'labelsKoperasi',
        'dataKoperasi'
    ));
}
}
