<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('id_type');
            $table->string('card_id');
            $table->string('nation');
            $table->string('name_title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone_no');
            $table->string('email');
            $table->string('address');
            $table->string('district');
            $table->string('amphoe');
            $table->string('province');
            $table->string('zipcode');
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
        //
    }
}
