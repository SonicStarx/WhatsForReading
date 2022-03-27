<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningObjectivePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_objective_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('LO_id');
            $table->foreign('LO_id')->references('LO_id')->on('learning_objectives')->onDelete('cascade');
            $table->unsignedBigInteger('pupilid');
            $table->foreign('pupilid')->references('pupilid')->on('pupils')->onDelete('cascade');
            $table->enum('performance', ['Working above expectations', 'Working at expectations', 'Working towards expectations', 'Working below expectations']);
            $table->text('Notes');
            $table->date('assessment_date');
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
        Schema::dropIfExists('learning_objective_performances');
    }
}
