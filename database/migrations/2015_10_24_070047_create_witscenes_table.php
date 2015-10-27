<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWitscenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('witscenes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description');
            $table->integer('section_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('address', 255);
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('zip', 255);
            $table->char('map_x', 15);
            $table->char('map_y', 15);
            $table->string('image', 512);
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['user_id', 'active', 'category_id', 'title']);
            $table->index(['section_id', 'active', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('witscenes');
    }
}
