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
        'avatar_image'
        
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
