<?php

/*
 * Реализуйте функцию getMirrorMatrix, которая принимает двумерный массив (матрицу) и возвращает массив,
 * изменённый таким образом, что правая половина матрицы становится зеркальной копией левой половины,
 *  симметричной относительно вертикальной оси матрицы.
 * Для простоты условимся, что матрица всегда имеет чётное количество столбцов и количество столбцов всегда равно количеству строк.

<?php

getMirrorMatrix([
  [11, 12, 13, 14],
  [21, 22, 23, 24],
  [31, 32, 33, 34],
  [41, 42, 43, 44],
]);

// → [
//     [11, 12, 12, 11],
//     [21, 22, 22, 21],
//     [31, 32, 32, 31],
//     [41, 42, 42, 41],
//   ]

function getMirrorMatrix(array $matrix): array
{
    $size = count($matrix);
    $middle = $size / 2;
    $mirroredMatrix = [];

    foreach ($matrix as $row) {
        $leftHalf = array_slice($row, 0, $middle);
        $mirroredMatrix[] = [...$leftHalf, ...array_reverse($leftHalf)];
    }

    return $mirroredMatrix;
}
 */

namespace App\Arrays;

function getMirrorMatrix(array $array): array
{
    return array_map(function ($item) {
        $countMirror = count($item) / 2;
        $partOne = array_slice($item, 0, $countMirror);
        $partTwo = array_reverse($partOne);
        return array_merge($partOne, $partTwo);
    }, $array);
}
