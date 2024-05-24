<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FournitureDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        'type_fourniture',
        'number_fourniture',
        'status',
        'why'
    ];
}
