<?php
/*
 * Реализуйте рекурсивную функцию factorial(), используя линейно-итеративный процесс.

src/Divisor.php
Реализуйте рекурсивную функцию smallestDivisor, используя линейно-итеративный процесс. Функция должна находить минимальный делитель переданного числа.

Минимальный делитель числа - это наименьшее число, на которое делится исходное без остатка.

Примеры
factorial(3); // 6
smallestDivisor(9); // 3
smallestDivisor(17); // 17
Алгоритм
Для поиска этого числа достаточно последовательно проверять делимость начиная с двойки. Если делитель не найден, значит это само число, а искомое число простое.

Подсказки
В PHP за нахождение остатка от деления отвечает операция %, например: 5 % 3; // 2
 */

namespace App\Factorial;

function factorial($num)
{
    $iter = function ($num, $acc) use (&$iter) {
        if ($num === 0 || $num === 1) {
            return $acc;
        }
        return $iter($num - 1, $acc*$num);

    };
    return $iter($num, 1);
}

function smallestDivisor($num)
{
    $iter = function ($acc) use (&$iter, $num) {
        if ($num === 1) {
            return $num;
        }
        if ($num % $acc === 0) {
            return $acc;
        }
        return  $iter ($acc + 1);
    };
    return $iter(2);
}
