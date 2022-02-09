<?php

/*
 * Реализуйте функцию convert(), которая принимает на вход массив определённой структуры и возвращает
 *  ассоциативный массив, полученный из этого массива.

Исходный массив устроен таким образом, что с помощью него можно представлять ассоциативные массивы.
 Каждое значение внутри него — это массив из двух элементов, где первый элемент — ключ, а второй — значение.
В свою очередь, если значение тоже является массивом, то считается, что это вложенное представление ассоциативного
массива. Другими словами, любой массив внутри исходного массива всегда рассматривается как данные,
 которые нужно конвертировать в элемент ассоциативного массива.

<?php

convert([]); // []
convert([['key', 'value']]); // [ 'key' => 'value' ]
convert([['key', 'value'], ['key2', 'value2']]); // [ 'key' => 'value', 'key2' => 'value2']

convert([
  ['key', [['key2', 'anotherValue']]],
  ['key2', 'value2']
]);
// [ 'key' => ['key2' => 'anotherValue'], 'key2' => 'value2' ]
Подсказки
is_array - проверяет, является ли переменная (элемент) массивом.
Решение:
function convert($arr)
{
    $result = array_reduce($arr, function ($acc, $item) {
        [$key, $value] = $item;
        $newValue = is_array($value) ? convert($value) : $value;
        return array_merge($acc, [$key => $newValue]);
    }, []);

    return $result;
}
 */
namespace App\Convert;

function convertArray(array $array)
{
    return array_reduce($array, function ($acc, $item) {

              [$key, $value] = $item;
        if (is_array($value)) {
            $acc[$key] = convert($value);
        } else {
            $acc[$key] = $value;
        }
        return $acc;
    }, []);
}
