<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkRestockAndGoodsToGoodsStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods_stock', function (Blueprint $table) {
            $table->integer('restock_id')->unsigned()->after('id');
            $table->integer('goods_id')->unsigned()->after('restock_id');
            $table->foreign('restock_id')->references('id')->on('restock')->onDelete('cascade');
            $table->foreign('goods_id')->references('id')->on('goods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods_stock', function (Blueprint $table) {
            $table->dropForeign(['restock_id']);
            $table->dropForeign(['goods_id']);
        });
    }
}
