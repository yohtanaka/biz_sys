<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function names()
    {
        $names = [];
        foreach (Position::all() as $position) {
            $names[] = $position->name;
        }
        return $names;
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'position_code', 'code');
    }
}
