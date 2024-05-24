<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'admin_name',
        'email',
        'role',
        'status',
        'password',
        'rental_number',
        'cadre',
        'address',
        'observations'
    ];

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function notice(){
        return $this->hasMany(Notice::class);
    }

    

}
