<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    //
    protected $fillable=[
        'name',
        'email',
        'password',
        'national_id'
        
        
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

}
