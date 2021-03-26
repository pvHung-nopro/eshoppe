<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use Collect;

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

    public function socialites()
    {
        return $this->belongsTo('App\Models\Socialites','email','email');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment','user_id','id');
    }


    public function roles()
    {
        return $this->belongsToMany('App\Models\roles','table_user_roles','user_id','roles_id');
    }

    public function checkPermission($keyCode)
    {

        // dd($keyCode);
       $roles = Auth::user()->roles;


       foreach($roles as $role)
       {
          $permission = $role->permissions;
        //   dd($permission->contains('key_code',$keyCode));
        //   dd( $permission );
          if($permission->contains('key_code',$keyCode)){
              return true;
          }
       }
       return false;
    //    dd($roles) ;
    }


}
