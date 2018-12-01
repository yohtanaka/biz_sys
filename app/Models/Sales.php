<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'user_code',
        'shop_code',
        'type',
        'amount',
        'sold_date',
    ];

    static $names = [
        'user_code' => '担当者コード',
        'shop_code' => '店舗コード',
        'type'      => '売上分類',
        'amount'    => '売上金額',
        'sold_date' => '売上計上日',
    ];

    static $type = [
        1 => '補充',
        2 => '企画',
        3 => '返品',
    ];
}
