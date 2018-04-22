<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'passwword',
        
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class);
    }

}
