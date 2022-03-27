<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pupil extends Model
{
    use HasFactory;

    protected $fillable = [
      'pupilid','first_name','last_name','teacherid','year_group','class'
    ];

    public function performance()
    {
      return $this->hasOne(PupilPerformance::class,'pupilid');
    }

    public function record()
    {
      return $this->hasMany(ReadingEntries::class, 'entryid');
    }

    public function parents()
    {
      return $this->belongsToMany(User::class,'pupil_parents','parentid', 'parentid');
    }

    protected $primaryKey = 'pupilid';


}
