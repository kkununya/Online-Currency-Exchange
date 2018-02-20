<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('user_id');
            $table->string('payment_id');
            $table->string('selected_date');
            $table->string('purpose_id');
            $table->double('total_price');
            $table->string('pick_up_date_time');
            $table->string('pick_up_branch');
            $table->timestamps();
            $table->integer('customer_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->integer('selected_branch_id');
            $table->integer('order_status_id')->unsigned();

            $table->foreign('customer_id')
                  ->references('id')
                  ->on('customers')
                  ->onDelete('cascade');

            $table->foreign('receiver_id')
                ->references('id')
                ->on('receivers')
                ->onDelete('cascade');

            $table->foreign('order_status_id')
                ->references('id')
                ->on('order_status')
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
        Schema::dropIfExists('orders');
    }
}

