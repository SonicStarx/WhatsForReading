<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
      'book_title','author','category','phonics_level','book_band', 'available_quantity', 'image'
    ];

    protected $primaryKey = 'bookid';

    public function tags()
    {
      return $this->belongsToMany(Tag::class,'book_tag','bookid', 'tag_id');
    }

    public function REntry()
    {
        return $this->hasMany(ReadingEntries::class,'bookid','bookid','entryid');
    }
}
