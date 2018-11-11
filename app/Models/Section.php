<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    static function names()
    {
        $names = [];
        foreach (Section::all() as $section) {
            $names[$section->code] = $section->name;
        }
        return $names;
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'section_code', 'code');
    }
}
