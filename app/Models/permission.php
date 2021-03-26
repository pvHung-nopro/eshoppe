<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected  $guarded = [];

    public function permissionChild()
    {
        return $this->hasMany('App\Models\permission','parent_id');
    }
}
