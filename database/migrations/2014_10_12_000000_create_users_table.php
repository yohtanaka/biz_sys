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
            $table->string       ('email')            ->nullable()->comment('メールアドレス')->unique();
            $table->timestamp    ('email_verified_at')->nullable();
            $table->string       ('password')         ->nullable()->comment('パスワード');
            $table->tinyInteger  ('role')             ->default(0)->comment('権限')->unsigned()->index('index_role');
            $table->integer      ('code')             ->nullable()->comment('社員番号')->unsigned();
            $table->string       ('last_name')        ->nullable()->comment('姓');
            $table->string       ('first_name')       ->nullable()->comment('名');
            $table->string       ('l_n_kana')         ->nullable()->comment('姓カナ');
            $table->string       ('f_n_kana')         ->nullable()->comment('名カナ');
            $table->tinyInteger  ('gender')           ->nullable()->comment('性別 0:男性, 1:女性, 2:その他');
            $table->date         ('birthday')         ->nullable()->comment('誕生日');
            $table->string       ('zip')              ->nullable()->comment('郵便番号');
            $table->integer      ('city_code')        ->nullable()->comment('市区町村')->unsigned();
            $table->string       ('street')           ->nullable()->comment('番地');
            $table->string       ('building')         ->nullable()->comment('建物');
            $table->string       ('tel_private')      ->nullable()->comment('個人電話');
            $table->string       ('tel_work')         ->nullable()->comment('社用電話');
            $table->integer      ('section_code')     ->nullable()->comment('部署')->unsigned();
            $table->integer      ('position_code')    ->nullable()->comment('役職')->unsigned();
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
