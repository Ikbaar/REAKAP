<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legalitas extends Model
{
    protected $table = 'legalitas';

    protected $fillable = [
        'name_cooperatives',
        'shm',
        'sppt',
        'skpt',
        'sklg',
        'customary',
        'skt',
        'other'
    ];

    public $timestamps = true;

    /**
     * Get the name of the cooperative.
     */
    public function getNameCooperativesAttribute($value)
    {
        return ucfirst($value);
    }
}


