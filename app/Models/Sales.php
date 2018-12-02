<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\Position', 'user_code', 'code');
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Position', 'shop_code', 'code');
    }

    public function project()
    {
        return $this->belongsTo('App\Models\Position', 'project_code', 'code');
    }

    public function items()
    {
        return $this->belongsToMany('App\Models\Item');
    }

    static $names = [
        'amount'         => '金額',
        'user_code'      => '担当者コード',
        'shop_code'      => '店舗コード',
        'project_code'   => 'プロジェクトコード',
        'recording_date' => '計上日',
    ];

    protected $fillable = [
        'amount',
        'user_code',
        'shop_code',
        'project_code',
        'recording_date',
    ];
}
