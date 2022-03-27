<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PupilPerformance extends Model
{
    use HasFactory;

    protected $fillable = [
      'pupilid','reading_level','phonics_level','working_level','uploaded_date','assessment_date'
    ];

    public $timestamps = false;
    protected $dates = ['uploaded_date','assessment_date'];

    public function pupil()
    {
      return $this->belongsTo(Pupil::class, 'pupilid', 'pupilid');
    }

}
