<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    protected $fillable = [
        'name', 'email', 'password','country','gender'
    ];
    //
}
