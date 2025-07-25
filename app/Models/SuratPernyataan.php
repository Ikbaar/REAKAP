<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratPernyataan extends Model
{
     protected $fillable = [
        'nama_koperasi',
        'total_surat'
    ];
}
