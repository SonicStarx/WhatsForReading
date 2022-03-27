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
final class ProgressRate extends Enumeration
{

    public const RateOne = "Working above expectations";
    public const RateTwo = 'Working at expectations';
    public const RateThree = "Working towards expectations";
    public const RateFour = "Working below expectations";

    public static $types = [self::RateOne, self::RateTwo, self::RateThree, self::RateFour];


}
