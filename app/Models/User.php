<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Section;
use App\Models\Position;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'role',
        'code',
        'last_name',
        'first_name',
        'l_n_kana',
        'f_n_kana',
        'gender',
        'birthday',
        'zip',
        'city_code',
        'street',
        'building',
        'tel_private',
        'tel_work',
        'section_code',
        'position_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static $roles = [
        1  => 'システム',
        2  => 'マスター',
        5  => '管理者',
        10 => '一般',
    ];

    static $gender = [
        '男性', '女性', 'その他',
    ];

    static function addParams($data)
    {
        $data += [
            'roles'     => User::$roles,
            'gender'    => User::$gender,
            'sections'  => Section::names(),
            'positions' => Position::names(),
        ];
        return $data;
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_code', 'code');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_code', 'code');
    }
}
