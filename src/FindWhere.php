<?php

/*
 * Реализуйте функцию findWhere, которая принимает на вход массив (элементы которого - ассоциативные массивы)
 *  и пары ключ-значение (тоже в виде массива), а возвращает первый элемент исходного массива,
 *  значения которого соответствуют переданным парам (всем переданным). Если совпадений не было, то функция должна вернуть null.

<?php

findWhere(
    [
        ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
        ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
        ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
        ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
        ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
    ],
    ['author' => 'Shakespeare', 'year' => 1611]
); // ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611]

function findWhere($data, $where)
{
    foreach ($data as $item) {
        $find = true;
        foreach ($where as $key => $value) {
            if ($item[$key] !== $value) {
                $find = false;
            }
        }
        if ($find) {
            return $item;
        }
    }
}
 */

namespace App\Arrays;

function findWhere(array $array, array $needle)
{
    $result = array_filter($array, function ($item) use ($needle) {
        foreach ($needle as $value) {
            return in_array($value, $item) ?  true : false;
        }
    });
    return $result === [] ? null :  $result[array_key_first($result)];
}
