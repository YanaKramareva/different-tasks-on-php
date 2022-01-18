<?php
/*
 * Реализуйте функцию flatten(), которая делает плоским вложенный массив.

Примеры
<?php

$list = [1, 2, [3, 5], [[4, 3], 2]];

flatten($list); // [1, 2, 3, 5, 4, 3, 2]
Подсказки
is_array - проверяет, является ли переменная (элемент) массивом.
Решение:
function flatten($tree)
{
    return array_reduce(
        $tree,
        fn($acc, $element) =>
            is_array($element) ? [...$acc, ...flatten($element)] : [...$acc, $element], [],);
}
 */

namespace App\Solution;

use function Php\Immutable\Fs\Trees\trees\array_flatten;

function flatten($list)
{
    $result = [];
    foreach ($list as $key => $value) {
        if (is_array($value)) {
            $value = flatten($value);
            $result = array_merge($result, $value);
        } else {
            $result[] = $value;
        }
    }
    return $result;
}

