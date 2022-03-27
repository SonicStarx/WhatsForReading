<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('bookid');
            $table->string('book_title');
            $table->string('author');
            $table->enum('category',['Fiction', 'Non-Fiction', 'Phonics']);
            $table->enum('phonics_level',['Stage 1', 'Stage 2', 'Stage 3', 'Stage 4', 'Stage 5', 'Stage 6'])->nullable();
            $table->enum('book_band',['Lilac', 'Pink', 'Red', 'Yellow', 'Light Blue', 'Green', 'Orange', 'Turquoise', 'Purple', 'Gold', 'White', 'Lime', 'Lime +', 'Brown', 'Grey', 'Dark Blue', 'Dark Red'])->nullable();
            $table->smallInteger('available_quantity');
            $table->smallInteger('on_loan')->default('0');
            $table->string('image', 256)->nullable();
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
        Schema::dropIfExists('books');
    }
}
