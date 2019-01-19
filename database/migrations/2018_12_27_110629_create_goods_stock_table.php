<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_stock', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restock_id')->unsigned()->foreign('restock_id')->references('id')->on('restock')->onDelete('cascade');
            $table->integer('goods_id')->unsigned()->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
            $table->integer('add_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_stock');
    }
}
