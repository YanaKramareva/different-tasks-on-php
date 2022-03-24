<?php

/*
 * Реализуйте функцию isPowerOfThree() которая определяет,
 * является ли переданное число натуральной степенью тройки.
 * Например, число 27 – это третья степень (33), а 81 – четвёртая (34).

<?php

isPowerOfThree(1); // → true (3^0)
isPowerOfThree(3); // → true
isPowerOfThree(4); // → false
isPowerOfThree(9); // → true

function isPowerOfThree(int $num)
{
    $current = 1;
    while ($current <= $num) {
        if ($current === $num) {
            return true;
        }
        $current *= 3;
    }

    return false;
}
 */

namespace App\Solution;

function isPowerOfThree($number)
{
    if ($number === 1) {
        return true;
    }
    if ($number === 0 || $number % 3 !== 0) {
        return false;
    }
    return isPowerOfThree($number / 3);
}
