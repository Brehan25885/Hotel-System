<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{  
    protected $fillable = [
        'name', 'email', 'password','manager_id','national_id'
    ];
    //
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}
