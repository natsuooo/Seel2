<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
					$table->increments('id');
					$table->unsignedInteger('user_id');
					$table->string('user_name');
					$table->string('header_image')->nullable();
					$table->string('profile_image')->nullable();
					$table->string('facebook')->nullable();
					$table->string('instagram')->nullable();
					$table->string('twitter')->nullable();
					$table->string('text')->nullable();
					
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
        Schema::dropIfExists('profiles');
    }
}
