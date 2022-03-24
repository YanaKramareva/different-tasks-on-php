<?php

/*
 * Solution.php
Реализуйте функцию arrangeBiggestNumber, которая составляет самое большое число из переданного
массива чисел и возвращает его строковое представление. Например, из чисел [3, 24, 4]
мы можем составить такие: 3244, 3424, 2434, 2443, 4324, 4243 и самое больше из них — это 4324.

Пример
998764543431 === arrangeBiggestNumber([1, 34, 3, 98, 9, 76, 45, 4]);

 */


namespace App\Solution;

// BEGIN (write your solution here)
function arrangeBiggestNumber($array)
{
    $sortedArray = $array;
$callback = function ($a, $b) {
        if ($a === $b) {
            return 0;
        }
        $ab = $a . $b;
        $ba = $b . $a;
        return ($ab > $ba) ? -1 : 1;
    };
    usort($sortedArray, $callback);
    return implode('', $sortedArray);
}

