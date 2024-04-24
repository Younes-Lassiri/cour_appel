<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevicesDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_name',
        "type_device",
        "number_device",
        "why"
    ];
}
