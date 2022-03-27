<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningObjectivePerformance extends Model
{

    use HasFactory;

    protected $fillable = [
      'LO_id','pupilid','performance','Notes', 'assessment_date',
    ];

    protected $dates = ['assessment_date'];

    public function LOTitle()
    {
      return $this->belongsTo(Learning_objective::class, 'LO_id');
    }


}
