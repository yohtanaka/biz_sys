<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchTrait;

class Item extends Model
{
    use SearchTrait;

    /**
     * @return \App\Models\Sales
     */
    public function sales()
    {
        return $this->belongsToMany('App\Models\Sales');
    }
}
