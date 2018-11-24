<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'code', 'name',
    ];

    public $timestamps = false;

    static $names = [
        'code' => '役職コード',
        'name' => '役職名',
    ];

    static function names()
    {
        $names = [];
        foreach (self::all() as $position) {
            $names[$position->code] = $position->name;
        }
        return $names;
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'position_code', 'code');
    }
}
