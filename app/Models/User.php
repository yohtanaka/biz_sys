<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'city_id',
        'street',
        'building',
        'tel_private',
        'tel_work',
        'section',
        'position',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static $role = [
        1  => 'システム',
        2  => 'マスター',
        5  => '管理者',
        10 => '一般',
    ];

    static $gender = [
        '男性', '女性', 'その他',
    ];
}
