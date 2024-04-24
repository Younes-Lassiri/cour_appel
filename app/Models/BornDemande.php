<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BornDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        'work_type',
        'rental_number',
        'born_date',
        'born_duree',
        'born_start',
        'born_back'
    ];
}
