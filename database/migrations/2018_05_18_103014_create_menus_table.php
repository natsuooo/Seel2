<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
						$table->string('image')->nullable();
						$table->string('title')->nullable();
						$table->string('body')->nullable();
						$table->string('price')->nullable();

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
        Schema::dropIfExists('menus');
    }
}
