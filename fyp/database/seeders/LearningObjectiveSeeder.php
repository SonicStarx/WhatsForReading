<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LearningObjectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('learning_objectives')->insert([
        'LO_title' => 'Linking letters with sounds',
        'year_group' => 'Year 1',
        'LO_description' => 'Getting the class to read and identify words independently by making use of sounds already known',
      ]);
    }
}
