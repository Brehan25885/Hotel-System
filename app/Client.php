<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'country_code',
        'gender',
        'password',
        'avatar_image',


        
    ];
    protected $attributes = [
        'approved' => '0'
    ];
}
