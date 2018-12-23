<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * @return \App\Models\Sales
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales', 'position_code', 'code');
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
        foreach (self::all() as $project) {
            $names[$project->code] = $project->name;
        }
        return $names;
    }

    /**
     * @var array
     */
    public static $names = [
        'code' => 'プロジェクトコード',
        'name' => 'プロジェクト名',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name',
    ];
}
