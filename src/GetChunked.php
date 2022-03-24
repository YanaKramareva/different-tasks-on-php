<?php

/*
 * Чанкованием (от англ. Chunk — ячейка, кусок, осколок) в программировании называют разбиение коллекции
 *  (массива) на несколько более мелких коллекций.
 * Например, разобьём массив на чанки, так чтобы в каждом чанке было не более двух элементов:
 * ['a', 'b', 'c', 'd'] -> [['a', 'b'], ['c', 'd']].

src\Arrays.php
Реализуйте функцию getChunked, которая принимает на вход массив и число, задающее размер чанка (куска).
Функция должна вернуть массив, состоящий из чанков указанной размерности.

<?php

getChunked(['a', 'b', 'c', 'd'], 2);
// → [['a', 'b'], ['c', 'd']]

getChunked(['a', 'b', 'c', 'd'], 3);
// → [['a', 'b', 'c'], ['d']]
PS: Попробуйте реализовать это упражнение без использования встроенной в PHP функции array_chunk.
То есть вам нужно написать свою реализацию данной функции.
function getChunked(array $array, int $size)
{
    $result = [];
    for ($i = 0, $length = count($array); $i < $length; $i += $size) {
        $result[] = array_slice($array, $i, $size);
    }

    return $result;
}

 */

namespace App\Arrays;

function getChunked(array $array, int $number): array
{
    $result = [];
    $countOfChunks = ceil((count($array) / $number));
    for ($i = 0; $i < $countOfChunks; $i++) {
        $result[] = array_slice($array, $i * $number, $number);
    }
    return $result;
}
