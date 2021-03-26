<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Socialites extends Model
{
    protected $table = 'socialites';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User','email','email');
    }
}
