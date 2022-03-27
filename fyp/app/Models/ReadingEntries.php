<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadingEntries extends Model
{
    use HasFactory;
    protected $fillable = [
      'entryid','pupilid','bookid','read','assigned_week','date_created',
    ];



    protected $primaryKey = 'entryid';

    public function pupil()
    {
      return $this->belongsTo(Pupil::class,'pupilid');
    }

    public function book()
    {
      return $this->belongsTo(Book::class, 'bookid','bookid');
    }

    public $timestamps = false;
    protected $dates = ['assigned_week','date_created'];
}
