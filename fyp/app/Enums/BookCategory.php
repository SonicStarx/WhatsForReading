<?php

namespace App\Enums;
use Illuminate\Validation\Rules;
use Sourceboat\Enumeration\Enumeration;

/**
 * @method static self Fiction()
 * @method static self Non-Fiction()
 * @method static self Phonics()
 * @method bool isFiction()
 * @method bool isNon-Fiction()
 * @method bool isPhonics()
 */
final class BookCategory extends Enumeration
{
    public const Fiction = 'Fiction';
    public const NonFiction = 'Non-Fiction';
    public const Phonics = 'Phonics';

    public static $types = [self::Fiction, self::NonFiction, self::Phonics];
}
