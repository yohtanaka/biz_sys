<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer   ('pref_code')->comment('都道府県コード')->unsigned();
            $table->string    ('pref_name')->comment('都道府県名');
            $table->string    ('p_n_kana') ->comment('都道府県名カナ');
            $table->integer   ('city_code')->comment('市区町村コード')->unsigned();
            $table->string    ('city_name')->comment('市区町村名')->nullable();
            $table->string    ('c_n_kana') ->comment('市区町村名カナ')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
