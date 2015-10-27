<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->string('image', 512);                            
            $table->boolean('active')->default(1);
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->foreign('section_id')->references('id')->on('sections');
            $table->index(['section_id', 'active', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
