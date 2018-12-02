<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
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
