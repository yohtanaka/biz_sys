<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Traits\SearchTrait;

class News extends Model
{
    use SearchTrait;

    public function scopeForAdmins($query) {
        return $query->where('type', 1)->where('display_flag', 1)->latest()->get();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public static function boot()
    {
        parent::boot();
        self::saving(function(News $news) {
            if (Auth::check()) {
                $news->user_id = Auth::user()->id;
            }
        });
    }

    static $names = [
        'title'        => 'お知らせタイトル',
        'type'         => 'お知らせタイプ',
        'body'         => '本文',
        'display_flag' => '表示ステータス',
        'user_id'      => 'ユーザID',
    ];

    static $type = [
        1 => '管理者向け',
        2 => 'ユーザ向け',
    ];

    static $display = [
        1 => '表示',
        2 => '非表示',
    ];

    protected $fillable = [
        'title',
        'type',
        'body',
        'display_flag',
        'user_id',
    ];
}
