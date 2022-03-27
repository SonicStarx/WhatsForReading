<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PupilSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('pupils')->insert([
      'first_name' => 'Adam',
      'last_name' => 'Baker',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Fynley',
      'last_name' => 'Russo',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Evelyn',
      'last_name' => 'Guthrie',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Weronika',
      'last_name' => 'Booker',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Tina',
      'last_name' => 'Wise',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Aleyna',
      'last_name' => 'Hodge',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Tonicha',
      'last_name' => 'Drew',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Misha',
      'last_name' => 'Adam',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Eva-Rose',
      'last_name' => 'Summers',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Teri',
      'last_name' => 'Turnbull',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Archer',
      'last_name' => 'Hamer',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Ishmael',
      'last_name' => 'Rasmussen',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Jaidon',
      'last_name' => 'Bryan',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Kiah',
      'last_name' => 'Cortes',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Tobi',
      'last_name' => 'Smith',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'George',
      'last_name' => 'Stout',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Gwen',
      'last_name' => 'Bentley',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Isabel',
      'last_name' => 'Flowers',
      'teacherid' => '1',
      'year_group' => 'Reception',
      'class' => 'Pink',
    ]);


    DB::table('pupils')->insert([
      'first_name' => 'Sienna',
      'last_name' => 'Boone',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Arlo',
      'last_name' => 'Akhtar',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Yvette',
      'last_name' => 'Vaughan',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Rohaan',
      'last_name' => 'Keith',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Reegan',
      'last_name' => 'Reyes',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Addison',
      'last_name' => 'Marin',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Mandy',
      'last_name' => 'Bourne',
      'teacherid' => '2',
      'year_group' => 'Year 1',
      'class' => 'Purple',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Alannah',
      'last_name' => 'Davenport',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Saniya',
      'last_name' => 'Cordova',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Luca',
      'last_name' => 'Downs',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Rhiannan',
      'last_name' => 'Christensen',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Darien',
      'last_name' => 'Browning',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Sohaib',
      'last_name' => 'Fry',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Milton',
      'last_name' => 'Bright',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

    DB::table('pupils')->insert([
      'first_name' => 'Izaak',
      'last_name' => 'Cortes',
      'teacherid' => '3',
      'year_group' => 'Year 2',
      'class' => 'Sky',
    ]);

  }
}
