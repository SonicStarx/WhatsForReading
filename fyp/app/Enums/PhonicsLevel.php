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
final class PhonicsLevel extends Enumeration
{
    public const Stage1 = 'Stage 1';
    public const Stage2 ='Stage 2';
    public const Stage3 = 'Stage 3';
    public const Stage4 = 'Stage 4';
    public const Stage5 = 'Stage 5';
    public const Stage6 = 'Stage 6';

    public static $types = [self::Stage1, self::Stage2, self::Stage3, self::Stage4, self::Stage5, self::Stage6];
}
