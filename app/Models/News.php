<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'type',
        'body',
        'display_flag',
    ];

    static $names = [
        'title'         => 'お知らせタイトル',
        'type'          => 'お知らせタイプ',
        'body'          => '本文',
        'display_flag'  => '表示ステータス',
    ];

    static $type = [
        1 => '管理者向け',
        2 => 'ユーザ向け',
    ];

    static function addParams($data)
    {
        $data += [
            'type' => News::$type,
        ];
        return $data;
    }
}
