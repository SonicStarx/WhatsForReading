<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupil_parents', function (Blueprint $table) {
          $table->unsignedBigInteger('parentid');
          $table->foreign('parentid')->references('id')->on('users');
          $table->unsignedBigInteger('pupilid');
          $table->foreign('pupilid')->references('pupilid')->on('pupils');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupil_parents');
    }
}
