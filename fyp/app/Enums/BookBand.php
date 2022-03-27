<?php

namespace App\Enums;
use Illuminate\Validation\Rules;
use Sourceboat\Enumeration\Enumeration;

/**
* @method static self OptionOne()
* @method static self OptionTwo()
* @method static self OptionThree()
* @method bool isOptionOne()
* @method bool isOptionTwo()
* @method bool isOptionThree()
*/
final class BookBand extends Enumeration
{
  public const Lilac = 'Lilac';
  public const Pink = 'Pink';
  public const Red = 'Red';
  public const Yellow = 'Yellow';
  public const LightBlue = 'LightBlue';
  public const Green = 'Green';
  public const Orange = 'Orange';
  public const Turquoise = 'Turquoise';
  public const Purple = 'Purple';
  public const Gold = 'Gold';
  public const White = 'White';
  public const Lime = 'Lime';
  public const LimePlus = 'Lime+';
  public const Brown = 'Brown';
  public const Grey = 'Grey';
  public const DarkBlue = 'DarkBlue';
  public const DarkRed = 'DarkRed';

  public static $types = [self::Lilac, self::Pink, self::Red, self::Yellow, self::LightBlue, self::Green, self::Orange,
  self::Turquoise, self::Purple, self::Gold, self::White, self::Lime, self::LimePlus,
  self::Brown, self::Grey, self::DarkBlue, self::DarkRed];

}
