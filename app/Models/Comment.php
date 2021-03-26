<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected  $guarded = [];

    public function user()
    {
        return $this->belongTo('App\User','user_id','id');
    }

    public function product()
    {
        return $this->belongTo('App\Models\Products','product_id','id');
    }
}
