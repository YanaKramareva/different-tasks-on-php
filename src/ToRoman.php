<?php

/*
 * Для записи цифр римляне использовали буквы латинского алфавита: I, V, X, L, C, D, M. Например:

1 обозначалась с помощью буквы I
10 с помощью Х
7 с помощью VII
Число 2020 в римской записи — это MMXX (2000 = MM, 20 = XX).

src/Solution.php
Реализуйте функцию toRoman(), которая переводит арабские числа в римские.
 Функция принимает на вход целое число в диапазоне от 1 до 3000,
 а возвращает строку с римским представлением этого числа.

Реализуйте функцию toArabic(), которая переводит число в римской записи в число,
 записанное арабскими цифрами.
 Если переданное римское число не корректно, то функция должна вернуть значение false.

Примеры
<?php

use function App\Solution\toRoman;
use function App\Solution\toArabic;

toRoman(1);
// 'I'
toRoman(59);
// 'LIX'
toRoman(3000);
// 'MMM'

toArabic('I');
// 1
toArabic('LIX');
// 59
toArabic('MMM');
// 3000

toArabic('IIII');
// false
toArabic('VX');
// false
Подсказки
Подробнее о римской записи — https://ru.wikipedia.org/wiki/Римские_цифры

function toRoman($number)
{
    $digit = $number;
    $symbols = [];
    foreach (NUMERALS as $roman => $arabic) {
        $repetitionsCount = floor($digit / $arabic);
        $digit -= $repetitionsCount * $arabic;
        $symbols[] = str_repeat($roman, $repetitionsCount);
    }
    return implode('', $symbols);
}

function toArabic($roman)
{
    $result = 0;
    $currentLine = $roman;
    foreach (NUMERALS as $symbol => $number) {
        while (strpos($currentLine, $symbol) === 0) {
            $result += $number;
            $currentLine = substr_replace($currentLine, '', 0, strlen($symbol));
        }
    }

    if (toRoman($result) !== $roman) {
        return false;
    }

    return $result;
}
 */
namespace App\Solution;

const NUMERALS = [
    "M" => 1000,
    "CM" => 900,
    "D" => 500,
    "CD" => 400,
    "C" => 100,
    "XC" => 90,
    "L" => 50,
    "XL" => 40,
    "X" => 10,
    "IX" => 9,
    "V" => 5,
    "IV" => 4,
    "I" => 1,
];

function toRoman($number)
{
    $map = [1 => 'I', 2 => 'II',
        3 => 'III', 4 => 'IV',
        5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
    11 => 'XI', 12 => 'XII', 20 => 'XX', 30 => 'XXX',
        40 => 'XL', 50 => 'L', 60 => 'LX', 70 => 'LXX', 80 => 'LXXX', 90 => 'XC',
    100 => 'C', 200 => 'CC', 300 => 'CCC',
        400 => 'CD', 500 => 'D', 600 => 'DC', 700 => 'DCC', 800 => 'DCCC',
    900 => 'CM', 1000 => 'M', 2000 => 'MM', 3000 => 'MMM'];

    if (array_key_exists($number, $map)) {
        return $map[$number];
    }

        $arabicNumber = str_split($number);
        $count = count($arabicNumber);
    switch ($count) {
        case 2:
            $arabicNumber[0] .= '0';
            break;
        case 3:
            $arabicNumber[0] .= '00';
            if ($arabicNumber[1] !== '0') {
                $arabicNumber[1] .= '0';
            }
            break;
        case 4:
            $arabicNumber[0] .= '000';
            if ($arabicNumber[1] !== '0') {
                $arabicNumber[1] .= '00';
            }
            if ($arabicNumber[2] !== '0') {
                $arabicNumber[2] .= '0';
            }
            break;
    }
        $result = array_reduce($arabicNumber, function ($acc, $item) use ($map) {
            if (array_key_exists($item, $map)) {
                $acc[] = $map[$item];
            }
            return $acc;
        }, []);
        return implode('', $result);
}

function toArabic($number)
{
    if (array_key_exists($number, NUMERALS)) {
        return NUMERALS[$number];
    }

    $romNumber = str_split($number);
    $result = array_reduce($romNumber, function ($acc, $item) {
        if (array_key_exists($item, NUMERALS)) {
            $acc[] = NUMERALS[$item];
        }
        return $acc;
    }, []);
    foreach ($result as $key => $value) {
        if (array_key_exists($key + 1, $result) && $result[$key] < $result[$key + 1]) {
            $result[$key] = "-{$value}";
        }
    }
    $sum = array_sum($result);
    return $sum < 0 || in_array($sum, NUMERALS) ? false : $sum;
}
