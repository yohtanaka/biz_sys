<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchTrait;

class Shop extends Model
{
    use SearchTrait;

    /**
     * @return \App\Models\Sales
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }

    /**
     * @return \App\Models\Company
     */
    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
