<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }

    public function sales()
    {
        return $this->hasManyThrough('App\Models\Sales', 'App\Models\Shop');
    }
}
