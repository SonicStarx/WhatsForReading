<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning_objective extends Model
{
    use HasFactory;

    protected $primaryKey = 'LO_id';

    protected $fillable = [
      'LO_title','year_group','LO_description'
    ];

    public function performance()
    {
      return $this-> hasMany(LearningObjectivePerformance::class, 'LO_id');

    }
}
