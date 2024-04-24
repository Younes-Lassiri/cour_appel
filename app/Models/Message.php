<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message_date',
        'message_number',
        'received_date',
        'sender_name',
        'sender_city',
        'message_object'
    ];

/*
    public function response()
    {
        return $this->hasOne(Response::class, 'message_id');
    }*/
    

    public function response(): HasOne
    {
        return $this->hasOne(Response::class);
    }
    
    public function hasResponse()
    {
        return $this->response()->exists();
    }
}
