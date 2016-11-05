<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSermonrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sermonrequests', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('request');
            $table->string('title');
            $table->string('preacher');
            $table->string('service');
            $table->string('datepreached');
            $table->string('month');
            $table->string('year');
            $table->string('slug')->unique();
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
        Schema::drop('sermonrequests');
    }
}
