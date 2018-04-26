<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $fillable = [
        'client_id',
        'room_id',
        'price_paid',
          
    ];

    public function client()
    {
        //User::class == 'App\User'
        return $this->belongsTo(Client::class);
    }

    public function room()
    {
        //User::class == 'App\User'
        return $this->belongsTo(Room::class);
    }
}
