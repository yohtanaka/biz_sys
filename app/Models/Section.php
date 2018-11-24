<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'code', 'name',
    ];

    public $timestamps = false;

    static $names = [
        'code' => '部署コード',
        'name' => '部署名',
    ];

    static function names()
    {
        $names = [];
        foreach (self::all() as $section) {
            $names[$section->code] = $section->name;
        }
        return $names;
    }

    public function users()
    {
        return $this->hasMany('App\Models\User', 'section_code', 'code');
    }
}
