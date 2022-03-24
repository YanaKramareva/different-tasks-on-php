<?php

/*
 * Создайте функцию isPerfect, которая принимает число и возвращает true, если оно совершенное, и false — в ином случае.

<?php

isPerfect(6); // true
Совершенное число — это положительное целое число,
равное сумме его положительных делителей (не считая само число).
 Например, 6 — совершенное число, потому что 6 = 1 + 2 + 3.

 */

namespace App\Numbers;

function isPerfect($number)
{
    $denom = [];
    if ($number <= 0) {
        return false;
    }
    for ($i = 1; $i < $number; $i++) {
        if ($number % $i === 0) {
            $denom[] = $i;
        }
    }
    return array_sum($denom) === $number;
}
