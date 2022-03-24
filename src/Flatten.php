<?php

namespace App\Solution;

/*
 * Solution.php
Реализуйте функцию flatten, которая делает плоским массив любой вложенности.

Пример:

flatten([]); // []
flatten([[1], ['key' => 'value', [4]]]); // [1, 'value', 4]
function flatten($value)
{
    if (!is_array($value)) {
        return [$value];
    } elseif (sizeof($value) === 0) {
        return [];
    } elseif (sizeof($value) === 1) {
        return flatten(end($value));
    }
    return array_merge(flatten(array_slice($value, 0, 1)), flatten(array_slice($value, 1)));
}
 */
// BEGIN (write your solution here)
function flatten($array)
{
    if ($array === []) {
        return [];
    }
    if (!is_array($array)) {
        return [$array];
    }
    return array_reduce($array, fn ($acc, $item)=>array_merge($acc, flatten($item)), []);
}
// END
