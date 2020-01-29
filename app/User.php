<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function manager(){
      return $this->hasOne('App\Manager');
    }




    public function shifts(){
      return $this->belongsToMany('App\Shift', 'user_shift');
    }

    public function hasShift($shift){
      return null !== $this->shifts()->where('name', $shift)->first();
    }

    public function hasAnyShift($shifts){
      return null !== $this->shifts()->where('name', $shifts)->first();
    }


    public function roles(){
      return $this->belongsToMany('App\Role', 'user_role');
    }

    public function authorizeRoles($roles){
      if (is_array($roles)) {
        return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorised');
      }

      return $this->hasRole($roles) || abort(401, 'This action is unauthorised');
    }

    public function hasRole($role){
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRole($roles){
      return null !== $this->roles()->where('name', $roles)->first();
    }

}
