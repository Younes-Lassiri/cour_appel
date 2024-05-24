<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;


    protected $fillable = [
        "senderName",
        "senderEmail",
        "complainType",
        "senderPhone",
        "senderGender",
        "senderNaissance",
        "senderDocumentType",
        "senderCin",
        "senderNationality",
        "crimenalName",
        "crimenalGender",
        "date",
        "time",
        "cinImage",
        "cinImageBack",
        "suiviNum",
        "sujet",
        'status'
    ];
}
