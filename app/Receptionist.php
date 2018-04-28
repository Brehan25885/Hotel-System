<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class Receptionist extends Model
{  
    use Bannable;
    protected $fillable = [
        'name', 'email', 'password','manager_id','national_id','avatar_image'
    ];
    //
    public function manager()
    {
        return $this->belongsTo(User::class);
    }
}
