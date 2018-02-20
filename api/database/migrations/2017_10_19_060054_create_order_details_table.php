<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('label');
            $table->double('sale_rate');
            $table->double('purchase_rate');
            $table->double('quantity');
            $table->double('price_thb');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->integer('currency_id')->unsigned();

            $table->foreign('order_id')
                  ->references('id')
                  ->on('orders')
                  ->onDelete('cascade');

            $table->foreign('currency_id')
                  ->references('id')
                  ->on('currencies')
                  ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
