<?php

/*
 * Реализуйте функцию summaryRanges, которая находит в массиве непрерывные возрастающие последовательности чисел и возвращает массив с их перечислением.

<?php

summaryRanges([]);
// → []

summaryRanges([1]);
// → []

summaryRanges([1, 2, 3]);
// → ["1->3"]

summaryRanges([0, 1, 2, 4, 5, 7]);
// → ["0->2", "4->5"]

summaryRanges([110, 111, 112, 111, -5, -4, -2, -3, -4, -5]);
// → ['110->112', '-5->-4']

 */

namespace App\Solution;

function summaryRanges($numbers)
{
    $result = [];

    $rangeStart = "";
    $rangeEnd = "";

    foreach ($numbers as $key => $value) {
        if (
            ((!isset($numbers[$key - 1])) || ($numbers[$key - 1] + 1 != $value))
            && ((isset($numbers[$key + 1])) && ($numbers[$key + 1] - 1 == $value))
        ) {
            $rangeStart = $value;
        } elseif (
            ((!isset($numbers[$key + 1])) || ($numbers[$key + 1] - 1 != $value))
            && ((isset($numbers[$key - 1])) && ($numbers[$key - 1] + 1 == $value))
        ) {
            $rangeEnd = $value;

            $result[] = $rangeStart . "->" . $rangeEnd;

            $rangeStart = "";
            $rangeEnd = "";
        }
    }

    return $result;
}
