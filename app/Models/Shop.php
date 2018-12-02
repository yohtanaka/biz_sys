<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
