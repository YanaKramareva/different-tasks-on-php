<?php

/*
 * Реализуйте функцию combine(), которая объединяет несколько словарей (ассоциативных массивов) в один общий словарь.
 * Функция принимает на вход массив массивов и возвращает результат в виде ассоциативного массива,
 * в котором каждый ключ содержит список уникальных значений в виде массива.
 * Элементы в списке располагаются в том порядке, в котором они появляются во входящих словарях.

<?php
combine([[], [], [], []]);
// [];

combine([[ 'a' => 1, 'b' => 2 ], [ 'a' => 3 ]]);
// [ 'a' => [1, 3], 'b' => [2]];

combine([
    [ 'a' => 1, 'b' => 2, 'c' => 3 ],
    [],
    [ 'a' => 3, 'b' => 2, 'd' => 5],
    [ 'a' => 6 ],
    [ 'b' => 4, 'c' => 3, 'd' => 2 ],
    [ 'e' => 9 ],
]);
// [
//     'a' => [1, 3, 6],
//     'b' => [2, 4],
//     'c' => [3],
//     'd' => [5, 2],
//     'e' => [9],
// ];


 */

namespace App\Solution;

function combine(array $array)
{
    $startDictionary = [];
    foreach ($array as $item) {
        foreach ($item as $key => $value) {
            $startDictionary[$key] = array_key_exists($key, $startDictionary) ?
                array_unique(array_merge($startDictionary[$key], [$value])) : [$value];
        }
    }
    return $startDictionary;
}
