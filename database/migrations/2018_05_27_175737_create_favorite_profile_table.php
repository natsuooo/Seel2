<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_profile', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('favorite_id');
          $table->unsignedInteger('profile_id');
          $table->timestamps();

          $table->index('favorite_id');
          $table->index('profile_id');
          
          $table->foreign('favorite_id')
                ->references('id')
                ->on('favorites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
          
          $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_profile');
    }
}