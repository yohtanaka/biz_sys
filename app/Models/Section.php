<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * @return \App\Models\User
     */
    public function users()
    {
        return $this->hasMany('App\Models\User', 'section_code', 'code');
    }

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return array
     */
    public static function names()
    {
        $names = [];
        foreach (self::all() as $section) {
            $names[$section->code] = $section->name;
        }
        return $names;
    }

    /**
     * @var array
     */
    public static $names = [
        'code' => '部署コード',
        'name' => '部署名',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name',
    ];
}
