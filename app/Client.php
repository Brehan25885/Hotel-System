<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'password','is_approved','room_number','client_accompany_no','mobile','country','gender'
    ];

}
