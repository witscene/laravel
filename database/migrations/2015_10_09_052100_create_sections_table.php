<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->string('image', 512);                            
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->index(['active', 'title']);
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sections');
    }
}
