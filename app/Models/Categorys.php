<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    protected  $guarded = [];

    public function subcategory()
    {
        return $this->hasMany('App\Models\SubCategorys','category_id','id');
    }

    public function category_products()
    {
        return $this->hasMany('App\Models\Products','category_id','id');
    }
}
