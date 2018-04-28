<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements BannableContract
{
    use Notifiable;
    use HasRoles;
    use Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
public function role(){
    return $this->role;
}
public function receptionist()
{
    return $this->hasMany('App\Receptionist');
}
public function floor()
{
    return $this->hasMany('App\Floor');
}
public function room()
{
   return $this->hasMany('App\Room');
}
 /**
     * Determine if BannedAtScope should be applied by default.
     *
     * @return bool
     */
/*public function shouldApplyBannedAtScope()
{
    return true;
}*/
}
