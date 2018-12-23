<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\SearchTrait;

class Sales extends Model
{
    use SearchTrait;

    /**
     * @return App\Models\User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_code', 'code');
    }

    /**
     * @return App\Models\Shop
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_code', 'code');
    }

    /**
     * @return App\Models\Project
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project', 'project_code', 'code');
    }

    /**
     * @return App\Models\Item
     */
    public function items()
    {
        return $this->belongsToMany('App\Models\Item');
    }

    /**
     * @var array
     */
    public static $names = [
        'amount'         => '金額',
        'user_code'      => '担当者コード',
        'shop_code'      => '店舗コード',
        'project_code'   => 'プロジェクトコード',
        'recording_date' => '計上日',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'amount',
        'user_code',
        'shop_code',
        'project_code',
        'recording_date',
    ];
}
