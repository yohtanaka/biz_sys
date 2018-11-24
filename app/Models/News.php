<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class News extends Model
{
    protected $fillable = [
        'title',
        'type',
        'body',
        'display_flag',
        'user_id',
    ];

    static $names = [
        'title'         => 'お知らせタイトル',
        'type'          => 'お知らせタイプ',
        'body'          => '本文',
        'display_flag'  => '表示ステータス',
        'user_id'       => 'ユーザID',
    ];

    static $type = [
        1 => '管理者向け',
        2 => 'ユーザ向け',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function(News $news) {
            $news->user_id = Auth::user()->id;
        });
    }

    static function addParams($data)
    {
        $data += [
            'type' => self::$type,
        ];
        return $data;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
