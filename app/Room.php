<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
      'num', 'capacity', 'price','available'
    ];
}
