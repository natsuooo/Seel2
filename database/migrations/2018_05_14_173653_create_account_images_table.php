<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_images', function (Blueprint $table) {
          $table->increments('id');
					$table->unsignedInteger('user_id');
					$table->string('path');
					$table->timestamps();
					$table
						->foreign('user_id')
						->references('id')
						->on('users')
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
        Schema::dropIfExists('account_images');
    }
}
