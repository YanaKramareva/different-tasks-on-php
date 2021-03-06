<?php

/*
 * Чанкованием (от англ. Chunk — ячейка, кусок, осколок) в программировании называют разбиение коллекции (массива)
 * на несколько более мелких коллекций. Например, разобьём массив на чанки,
 * так чтобы в каждом чанке было не более двух элементов: ['a', 'b', 'c', 'd'] -> [['a', 'b'], ['c', 'd']].

src\Arrays.php
Реализуйте функцию getChunked, которая принимает на вход массив и число,
 задающее размер чанка (куска). Функция должна вернуть массив, состоящий из чанков указанной размерности.
 */

function getChunked(array $array, int $count): array
{
    $length = count($array);
    var_dump($length);
    $part = array_slice($array, 0, $count);
    $newArray = array_slice($array, $count);
    return $length <= $count  ? $array : array_merge([$part, [getChunked($newArray, $count)]]);
}
