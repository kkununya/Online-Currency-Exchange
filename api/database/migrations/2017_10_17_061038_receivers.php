<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Receivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivers', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->string('id_type');
            $table->string('card_id');
            $table->string('nation');
            $table->string('name_title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('telephone_no');
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
