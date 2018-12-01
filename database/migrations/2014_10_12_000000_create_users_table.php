<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments ('id');
            $table->string     ('email')        ->comment('メールアドレス')->unique();
            $table->string     ('password')     ->comment('パスワード')->nullable();
            $table->tinyInteger('role')         ->comment('権限')->default(0)->index('index_role');
            $table->integer    ('code')         ->comment('社員番号')->unsigned()->unique();
            $table->string     ('last_name')    ->comment('姓');
            $table->string     ('first_name')   ->comment('名')->nullable();
            $table->string     ('l_n_kana')     ->comment('姓カナ')->nullable();
            $table->string     ('f_n_kana')     ->comment('名カナ')->nullable();
            $table->tinyInteger('gender')       ->comment('性別 1:男性, 2:女性, 3:その他')->default(3);
            $table->date       ('birthday')     ->comment('生年月日')->nullable();
            $table->string     ('zip')          ->comment('郵便番号')->nullable();
            $table->integer    ('pref_code')    ->comment('都道府県コード')->nullable()->unsigned();
            $table->integer    ('city_code')    ->comment('市区町村コード')->nullable()->unsigned();
            $table->string     ('city')         ->comment('市区町村')->nullable();
            $table->string     ('street')       ->comment('番地')->nullable();
            $table->string     ('building')     ->comment('建物')->nullable();
            $table->string     ('tel_private')  ->comment('個人電話')->nullable();
            $table->string     ('tel_work')     ->comment('社用電話')->nullable();
            $table->integer    ('section_code') ->comment('部署コード')->unsigned();
            $table->integer    ('position_code')->comment('役職コード')->unsigned();
            $table->rememberToken();
            $table->timestamp  ('email_verified_at');
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
