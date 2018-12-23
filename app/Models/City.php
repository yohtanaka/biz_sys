<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * @return \App\Models\User
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'pref_code', 'pref_code');
    }
}
