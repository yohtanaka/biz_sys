<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Library\Search;

class News extends Model
{
    use Search;

    protected $fillable = [
        'title',
        'type',
        'body',
        'display_flag',
        'user_id',
    ];

    static $names = [
        'title'        => 'お知らせタイトル',
        'type'         => 'お知らせタイプ',
        'body'         => '本文',
        'display_flag' => '表示ステータス',
        'user_id'      => 'ユーザID',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function(News $news) {
            $news->user_id = Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
