<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer   ('count')   ->comment('商品数');
            $table->integer   ('item_id') ->comment('商品ID');
            $table->integer   ('sales_id')->comment('売上ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_sales');
    }
}
