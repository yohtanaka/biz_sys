<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function sales()
    {
        return $this->hasMany('App\Models\Sales', 'position_code', 'code');
    }

    public $timestamps = false;

    static function names()
    {
        $names = [];
        foreach (self::all() as $project) {
            $names[$project->code] = $project->name;
        }
        return $names;
    }

    static $names = [
        'code' => 'プロジェクトコード',
        'name' => 'プロジェクト名',
    ];

    protected $fillable = [
        'code', 'name',
    ];
}
