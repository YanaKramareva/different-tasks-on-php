<?php

/*
 * Реализуйте функцию getSameParity, которая принимает на вход список и возвращает новый, состоящий из элементов,
 * у которых такая же четность, как и у первого элемента входного списка.

<?php

getSameParity([]); // []
getSameParity([-1, 0, 1, -3, 10, -2]); // [-1, 1, -3]
function getSameParity(array $numbers)
{
    if (empty($numbers)) {
        return $numbers;
    }

    [$firstNum] = $numbers;
    $parity = abs($firstNum) % 2;
    $filtered = array_filter($numbers, function ($num) use ($parity) {
        return (abs($num) % 2) === $parity;
    });

    return array_values($filtered);
}
 */
namespace App\Arrays;

function getSameParity(array $array): array
{
    if ($array === []) {
        return $array;
    }
    return array_reduce($array, function ($acc, $item) use ($array) {
        if ($array[array_key_first($array)] % 2 === 0) {
            if ($item % 2 === 0) {
                $acc[] = $item;
            }
        } else {
            if ($item % 2 !== 0) {
                $acc[] = $item;
            }
        }
        return $acc;
    }, []);
}
