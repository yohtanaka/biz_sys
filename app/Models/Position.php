<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function users()
    {
        return $this->hasMany('App\Models\User', 'position_code', 'code');
    }

    public $timestamps = false;

    static function names()
    {
        $names = [];
        foreach (self::all() as $position) {
            $names[$position->code] = $position->name;
        }
        return $names;
    }

    static $names = [
        'code' => '役職コード',
        'name' => '役職名',
    ];

    protected $fillable = [
        'code', 'name',
    ];
}
