<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable=[
        'name',
        'email',
        'mobile',
        'country',
        'gender',
        
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
