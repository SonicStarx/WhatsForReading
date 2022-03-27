<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupils', function (Blueprint $table) {
            $table->id('pupilid');
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedBigInteger('teacherid');
            $table->foreign('teacherid')->references('teacherid')->on('teachers');
            $table->enum('year_group',['Reception', 'Year 1', 'Year 2']);
            $table->string('class');
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
        Schema::dropIfExists('pupils');
    }
}
