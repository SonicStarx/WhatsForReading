<?php

namespace App\Enums;

use Illuminate\Validation\Rules;
use Illuminate\Database\Eloquent\Model;




class SystemUsers extends Model
{
  const Admin ='Admin';
  const Teacher = 'Teacher';
  const Parents = 'Parent';
  const Librarian = 'Librarian';

  public static $types = [self::Admin, self::Teacher, self::Parents, self::Librarian];

}
