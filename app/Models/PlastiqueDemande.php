<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlastiqueDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        'prototype',
        'number_prototype',
        'class',
        'status',
        'observations'
    ];
}
