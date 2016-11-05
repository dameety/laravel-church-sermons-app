<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
/*            $table->integer('preacher_id')->unsigned();
            $table->foreign('preacher_id')->references('id')->on('preachers')->onDelete('cascade');*/
            $table->integer('preacher');

            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('datepreached');
            $table->string('month');
            $table->string('year');
            $table->string('status')->default('free');
            $table->string('sermonFileName');
            $table->string('size');
            $table->string('type');
            $table->string('slug');

            $table->softdeletes();
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
        Schema::drop('sermons');
    }
}
