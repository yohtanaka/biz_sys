<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments ('id');
            $table->string     ('title')       ->comment('タイトル');
            $table->tinyInteger('type')        ->comment('タイプ 1:管理者向け 2:ユーザ向け');
            $table->text       ('body')        ->comment('本文');
            $table->tinyInteger('display_flag')->comment('表示ステータス 1:表示 2:非表示')->default(1);
            $table->integer    ('user_id')     ->comment('ユーザID')->unsigned();
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
        Schema::dropIfExists('news');
    }
}
