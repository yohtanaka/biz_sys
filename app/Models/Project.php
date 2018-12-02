<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'code', 'name',
    ];

    public $timestamps = false;

    static $names = [
        'code' => 'プロジェクトコード',
        'name' => 'プロジェクト名',
    ];

    static function names()
    {
        $names = [];
        foreach (self::all() as $project) {
            $names[$project->code] = $project->name;
        }
        return $names;
    }

    public function sales()
    {
        return $this->hasMany('App\Models\Sales', 'position_code', 'code');
    }
}
