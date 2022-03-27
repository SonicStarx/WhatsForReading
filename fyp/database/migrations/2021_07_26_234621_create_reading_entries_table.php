<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_entries', function (Blueprint $table) {
            $table->id('entryid');
            $table->unsignedBigInteger('pupilid');
            $table->foreign('pupilid')->references('pupilid')->on('pupils')->onDelete('cascade');
            $table->unsignedBigInteger('bookid');
            $table->foreign('bookid')->references('bookid')->on('books')->onDelete('cascade');
            $table->boolean('read')->default(0);
            $table->dateTime('assigned_week');
            $table->dateTime('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_entries');
    }
}
