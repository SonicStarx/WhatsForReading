<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tag', function (Blueprint $table) {
          $table->id('entry_id');
          $table->unsignedBigInteger('tag_id');
          $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade');
          $table->unsignedBigInteger('bookid');
          $table->foreign('bookid')->references('bookid')->on('books')->onDelete('cascade');

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
        Schema::dropIfExists('book_tag');
    }
}
