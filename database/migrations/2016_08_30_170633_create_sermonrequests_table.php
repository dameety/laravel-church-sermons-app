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

            $table->string('sermontitle');
            $table->string('preacher');
            $table->string('moreinfo');
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
