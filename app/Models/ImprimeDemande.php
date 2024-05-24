<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImprimeDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        "type_imprime",
        "number_imprime",
        'status',
        "why"
    ];
}
