<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('topics', function (Blueprint $table) {
      $table->id();
      $table->string('topic_title');
      $table->text('topic_description');
      $table->date('scheduled_teaching');
      $table->unsignedBigInteger('topicLO');
      $table->foreign('topicLO')->references('LO_id')->on('learning_objectives')->onDelete('cascade');

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
    Schema::dropIfExists('topics');
  }
}
