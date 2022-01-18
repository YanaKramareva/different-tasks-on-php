<?php
/*
 * Напишите функцию sameParity(), которая принимает на вход список и возвращает новый, состоящий из элементов, у которых такая же чётность, как и у первого элемента входного списка.

Примеры
<?php

use function Php\Pairs\Data\Lists\l;

sameParity(l(-1, 0, 1, -3, 10, -2)); // (-1, 1, -3)

sameParity(l(2, 0, 1, -3, 10, -2)); // (2, 0, 10, -2)

sameParity(l()); // ()
Решение:
function isEven($num)
{
    return $num % 2 === 0;
}

function sameParity($list)
{
    if (isEmpty($list)) {
        return l();
    }

    $firstItem = head($list);
    $firstItemParity = isEven($firstItem);

    return filter($list, fn($value) => isEven($value) === $firstItemParity);
}
 */

namespace App\SameParityFilter;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\filter;
use function Php\Pairs\Data\Lists\toString as listToString;

function sameParity($list)
{
    return filter($list, function ($item) use ($list){
       return head($list) % 2 === 0 ? $item % 2 === 0: $item %2 !==0;
       });
}