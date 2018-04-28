<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'email', 'password','is_approved',
        'room_number','client_accompany_no','mobile',
        'country','gender',  'avatar_image',
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    
    protected $attributes = [
        'national_id' => '0',
        'client_accompany_no'=>'0',
        'room_number'=>'0',
        'is_approved'=>'0',
        'paid_price'=>'0',
        'recep_id' =>'0',
        'admin_id'=>'0'
    ];

}
