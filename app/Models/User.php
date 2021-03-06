<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Section;
use App\Models\Position;
use App\Traits\SearchTrait;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, SearchTrait;

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * @return \App\Models\City
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'pref_code', 'pref_code');
    }

    /**
     * @return \App\Models\Section
     */
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_code', 'code');
    }

    /**
     * @return \App\Models\Position
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_code', 'code');
    }

    /**
     * @return \App\Models\News
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * @return \App\Models\Sales
     */
    public function sales()
    {
        return $this->hasMany('App\Models\Sales');
    }

    /**
     * @var array
     */
    public static $names = [
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
        'pref_code'     => '都道府県',
        'city_code'     => '市区町村コード',
        'city_name'     => '市区町村',
        'street'        => '番地',
        'building'      => '建物',
        'tel_private'   => '個人電話',
        'tel_work'      => '社用電話',
        'section_code'  => '部署',
        'position_code' => '役職',
    ];

    /**
     * @var array
     */
    public static $roles = [
        1  => 'システム',
        2  => 'マスター',
        5  => '管理者',
        10 => '一般',
    ];

    /**
     * @var array
     */
    public static $gender = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
    ];

    /**
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
        'pref_code',
        'city_code',
        'city_name',
        'street',
        'building',
        'tel_private',
        'tel_work',
        'section_code',
        'position_code',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];
}
