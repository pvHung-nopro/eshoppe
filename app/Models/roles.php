<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected  $guarded = [];

    public function users()
    {
        return $this->belongsToMany('App\User','table_user_roles','roles_id','user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\permission','table_permission_roles','roles_id','permission_id');
    }
}


