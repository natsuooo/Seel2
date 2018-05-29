<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserves', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('reserve_profile_id');
          $table->unsignedInteger('reserved_profile_id');
          $table->unsignedInteger('number');
          $table->text('reserved_menu');
          $table->text('calendar');
          $table->text('message');
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
        Schema::dropIfExists('reserves');
    }
}
