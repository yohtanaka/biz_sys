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
            $table->integer    ('amount')        ->comment('金額');
            $table->integer    ('user_code')     ->comment('担当者コード');
            $table->integer    ('shop_code')     ->comment('店舗コード');
            $table->tinyInteger('project_code')  ->comment('プロジェクトコード');
            $table->date       ('recording_date')->comment('計上日');
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
