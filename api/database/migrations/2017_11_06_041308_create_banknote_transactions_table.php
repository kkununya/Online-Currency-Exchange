<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanknoteTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banknote_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('banknote_id');
            $table->integer('amount');
            $table->integer('order_detail_id')->unsigned();
            
            $table->foreign('order_detail_id')
                ->references('id')
                ->on('order_details')
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
        Schema::dropIfExists('banknote_transactions');
    }
}
