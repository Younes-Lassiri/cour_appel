<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeAbsence extends Model
{
    use HasFactory;

    protected $table = 'demande';
    protected $fillable = [
        'employe_id',
        'employe_name',
        'date_from',
        'date_to',
        'reason',
        'status',
        'type_demande'
    ];
}
