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
final class Tag extends Enumeration
{
    public const OptionOne = 0;
    public const OptionTwo = 1;
    public const OptionThree = 2;
}
