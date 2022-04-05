<?php

namespace App\Arrays;

/*
 * Реализуйте функцию findIndexOfNearest, которая принимает на вход массив чисел и искомое число.
 *  Задача функции — найти в массиве ближайшее число к искомому и вернуть его индекс в массиве.

Если в массиве содержится несколько чисел, одновременно являющихся ближайшими к искомому числу,
то возвращается наименьший из индексов ближайших чисел.

Примеры
<?php

findIndexOfNearest([], 2); // null
findIndexOfNearest([15, 10, 3, 4], 0); // 2

function findIndexOfNearest(array $items, $value)
{
    if (empty($items)) {
        return null;
    }

    return array_reduce(
        array_keys($items),
        fn($acc, $i) => abs($items[$i] - $value) < abs($items[$acc] - $value) ? $i : $acc,
        0
    );
}
 */
function findIndexOfNearest(array $array, int $number)
{
    if ($array === []) {
        return null;
    }
    $diffArray = array_map(fn($item) => $item < 0 && $number > 0 ? abs($item) + $number :
        abs($item - $number), $array);
    $min = min($diffArray);
    $filteredArray = array_filter($array, fn($item) => $item < 0 && $number > 0 ? abs($item) + $number :
        abs($item - $number) === $min);
    return array_key_first($filteredArray);
}
