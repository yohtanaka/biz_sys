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
            $table->increments   ('id');
            $table->string       ('last_name')   ->comment('姓');
            $table->string       ('first_name')  ->comment('名');
            $table->string       ('l_n_kana')    ->comment('姓カナ');
            $table->string       ('f_n_kana')    ->comment('名カナ');
            $table->tinyInteger  ('gender')      ->comment('性別 0:男性, 1:女性, 2:その他');
            $table->date         ('birthday')    ->comment('誕生日');
            $table->string       ('zip')         ->comment('郵便番号');
            $table->integer      ('city_id')     ->comment('市区町村ID')->unsigned();
            $table->string       ('street')      ->comment('番地');
            $table->string       ('building')    ->comment('建物')->nullable();
            $table->string       ('tel_private') ->comment('個人電話');
            $table->string       ('tel_work')    ->comment('社用電話')->nullable();
            $table->string       ('email')       ->comment('メールアドレス')->unique();
            $table->timestamp    ('email_verified_at')->nullable();
            $table->string       ('password')    ->comment('パスワード');
            $table->integer      ('code')        ->comment('社員番号')->unsigned();
            $table->tinyInteger  ('role')        ->comment('権限')->unsigned();
            $table->integer      ('section')     ->comment('部署')->unsigned();
            $table->integer      ('position')    ->comment('役職')->unsigned();
            $table->rememberToken();
            $table->timestamps   ();
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
