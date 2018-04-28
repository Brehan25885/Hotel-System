<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable = [
        'id','name','manager_id',
    ];
    public function Manager(){
    return $this->belongsTo(User::class);
    }
}