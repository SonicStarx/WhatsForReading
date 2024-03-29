<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
      'tag'
    ];

    protected $primaryKey = 'tag_id';

    public function books()
    {
      return $this->belongsToMany(Book::class,'book_tag','tag_id','bookid');
    }
}
