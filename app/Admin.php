<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
        
    ];

    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
