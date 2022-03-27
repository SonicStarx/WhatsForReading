<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePupilPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupil_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pupilid');
            $table->foreign('pupilid')->references('pupilid')->on('pupils')->onDelete('cascade');
            $table->enum('reading_level', ['Lilac', 'Pink', 'Red', 'Yellow', 'Light Blue', 'Green', 'Orange', 'Turquoise', 'Purple', 'Gold', 'White', 'Lime', 'Lime +', 'Brown', 'Grey', 'Dark Blue', 'Dark Red']);
            $table->enum('phonics_level',['Stage 1', 'Stage 2', 'Stage 3', 'Stage 4', 'Stage 5', 'Stage 6']);
            $table->enum('working_level', ['Working above expectations', 'Working at expectations', 'Working towards expectations', 'Working below expectations']);
            $table->date('uploaded_date');
            $table->date('assessment_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupil_performances');
    }
}
