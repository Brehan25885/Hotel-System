<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'manager_id','number','price','capacity','floor_id'
    ];
   
    public function Manager(){
        return $this->belongsTo(User::class);
        }
    public function floor(){
        return $this->belongsTo(Floor::class);
    }
    public function getPriceAttribute($value)
    {
        return $this->attributes['price'] /100.0;
    }

}
