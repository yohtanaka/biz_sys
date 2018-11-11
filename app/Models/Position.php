<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    static function names()
    {
        $names = [];
        foreach (Position::all() as $position) {
            $names[$position->code] = $position->name;
        }
        return $names;
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'position_code', 'code');
    }
}
