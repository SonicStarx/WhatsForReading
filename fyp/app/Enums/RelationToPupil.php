<?php

namespace App\Enums;
use Illuminate\Validation\Rules;

/**
 * @method static self OptionOne()
 * @method static self OptionTwo()
 * @method static self OptionThree()
 * @method bool isOptionOne()
 * @method bool isOptionTwo()
 * @method bool isOptionThree()
 */

class RelationToPupil
{
  
    public const Mother = 'Mother';
    public const Father = 'Father';
    public const Aunt = 'Aunt';
    public const Uncle = 'Uncle';
    public const Cousin = 'Cousin';
    public const Guardian = 'Guardian';
    /**add brother and sister*/

    public static $types = [self::Mother, self::Father, self::Aunt,
      self::Uncle, self::Cousin, self::Guardian];

}
