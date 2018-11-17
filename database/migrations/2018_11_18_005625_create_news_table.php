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
            $table->tinyInteger('type')        ->comment('タイプ 0:管理者 1:ユーザ');
            $table->text       ('body')        ->comment('本文');
            $table->tinyInteger('display_flag')->comment('表示ステータス 0:非表示 1:表示')->default(1);
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
