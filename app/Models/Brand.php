<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected  $guarded = [];

    public function brand_products()
    {
        return $this->hasMany('App\Models\Brand','brand_id','id');
    }
}
