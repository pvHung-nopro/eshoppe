<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategorys extends Model
{
    protected  $guarded = [];

    protected $table = 'sub_categorys';

   public function categorys()
    {
         return $this->belongsTo('App\Models\Categorys','category_id','id');
    }
   public function product_subcategorys()
   {
       return $this->hasMany('App\Models\Products','subcategory_id','id');
   }
}
