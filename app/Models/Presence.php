<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        'time_in',
        'time_out',
    ];

    protected $dates = [
        'time_in',
        'time_out',
    ];
    
}
