<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_objectives', function (Blueprint $table) {
            $table->id('LO_id');
            $table->string('LO_title');
            $table->enum('year_group',['Reception', 'Year 1', 'Year 2']);
            $table->text('LO_description');
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
        Schema::dropIfExists('learning_objectives');
    }
}
