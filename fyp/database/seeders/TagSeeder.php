<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('tags')->insert([
      'tag' => 'Action'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Adventure'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Animals'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Comedy'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Comic'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Dinosaurs'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Fables'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Fairy Tale'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Fantasy'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Folklore'
    ]);

    DB::table('tags')->insert([
      'tag' => 'History'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Mystery'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Picture Book'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Sci-Fi'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Short-Stories'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Sports'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Spooky'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Reception'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Year 1'
    ]);

    DB::table('tags')->insert([
      'tag' => 'Year 2'
    ]);
  }
}
