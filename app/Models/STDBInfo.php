<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class STDBInfo extends Model
{
    protected $fillable = [
        'nama_koperasi',
        'formulir_selesai',
        'stdb_ke_disbun',
        'rilis_stdb',
        'tidak_ada_ish',
        'tidak_ada_percils',
        'luas_total'
    ];
}
