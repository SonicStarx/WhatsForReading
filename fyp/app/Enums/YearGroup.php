<?php

namespace App\Enums;

use Sourceboat\Enumeration\Enumeration;

/**
 * @method static self OptionOne()
 * @method static self OptionTwo()
 * @method static self OptionThree()
 * @method bool isOptionOne()
 * @method bool isOptionTwo()
 * @method bool isOptionThree()
 */
final class YearGroup extends Enumeration
{
    public const Reception = 'Reception';
    public const Year1 = 'Year 1';
    public const Year2 = 'Year 2';

    public static $types = [self::Reception, self::Year1, self::Year2];
}
