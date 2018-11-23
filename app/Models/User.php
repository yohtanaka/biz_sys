<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Section;
use App\Models\Position;

class User extends Authenticatable
{
    use Notifiable;
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

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    static $names = [
        'email'         => 'メールアドレス',
        'password'      => 'パスワード',
        'role'          => '権限',
        'code'          => '社員番号',
        'last_name'     => '苗字',
        'first_name'    => '名前',
        'l_n_kana'      => '苗字カナ',
        'f_n_kana'      => '名前カナ',
        'gender'        => '性別',
        'birthday'      => '生年月日',
        'zip'           => '郵便番号',
        'city_code'     => '市区町村',
        'street'        => '番地',
        'building'      => '建物',
        'tel_private'   => '個人電話',
        'tel_work'      => '社用電話',
        'section_code'  => '部署',
        'position_code' => '役職',
    ];

    static $roles = [
        1  => 'システム',
        2  => 'マスター',
        5  => '管理者',
        10 => '一般',
    ];

    static $gender = [
        '', '男性', '女性', 'その他',
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
