<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\User', 'section_code', 'code');
    }
}
