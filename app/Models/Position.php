<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    /**
     * @return \App\Models\User
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'position_code', 'code');
    }

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return array
     */
    static function names()
    {
        $names = [];
        foreach (self::all() as $position) {
            $names[$position->code] = $position->name;
        }
        return $names;
    }

    /**
     * @var array
     */
    public static $names = [
        'code' => '役職コード',
        'name' => '役職名',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name',
    ];
}
