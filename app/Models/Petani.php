<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
    use HasFactory;

    protected $table = 'petanis';

    protected $fillable = [
        'landid_vbw',
        'name',       // Name dari Excel
        'koperasi',
        'yop_vbw',
        'village',
        'luas_legalitas',
        'luas_shp',
        'legalitas',
        'stdb',
        'point_x',
        'point_y',
        'fkh548',
        'konsesirea',
        'wiup',
        'iuphhk_hti_ha',
        'nomor_legalitas'
    ];
}
