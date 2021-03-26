<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded = [];

    public function categorys()
    {
        return $this->belongTo('App\Models\Categorys','category_id','id');
    }

    public function sub_categorys()
    {
        return $this->belongsTo('App\Models\SubCategorys','subcatagory_id','id');
    }

    public function comment_products()
    {
        return $this->hasMany('App\Models\Comment','product_id','id');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


}
