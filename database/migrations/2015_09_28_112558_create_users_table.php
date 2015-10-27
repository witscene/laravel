<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('username', 255);
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('active')->default(1);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('phone', 255);
            $table->string('address');
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('zip', 255);
            $table->string('image', 512);
            $table->char('map_x', 15);
            $table->char('map_y', 15);
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->rememberToken();
            $table->timestamps();

            $table->index(['active', 'username']);
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
