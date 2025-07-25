<?php

// app/Models/LTH.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LTH extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_koperasi',
        'total_kepemilikan',
        'jumlah_percils',
        'luas_total',
    ];
}
