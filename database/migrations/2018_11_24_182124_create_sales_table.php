<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments ('id');
            $table->integer    ('user_code')   ->comment('担当者コード');
            $table->integer    ('campany_code')->comment('チェーンコード');
            $table->integer    ('shop_code')   ->comment('店舗コード');
            $table->tinyInteger('type')        ->comment('売上分類');
            $table->integer    ('amount')      ->comment('売上金額');
            $table->date       ('sold_date')   ->comment('売上計上日');
            $table->timestamps ();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
