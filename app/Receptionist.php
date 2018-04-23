<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'password',
        'country',
        'gender',
        'admin_id',
        
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
