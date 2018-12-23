<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchTrait;

class Company extends Model
{
    use SearchTrait;

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }

    public function sales()
    {
        return $this->hasManyThrough('App\Models\Sales', 'App\Models\Shop');
    }
}
