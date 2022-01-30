<?php

/*
 * Реализуйте функцию length(), которая считает длину списка;

src/Append.php
Реализуйте функцию append(), которая соединяет два списка;

Попробуйте сначала представить как работала бы функция copy(), которая принимает на вход список и возвращает его копию.

src/Reverse.php
Реализуйте функцию reverse(), которая переворачивает список;

Подсказки
Пустой список это null
 */

namespace App\Append;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

function append($list1, $list2)
{

    if ($list1 === null){
        return $list2;
    }
    if (cdr($list1) === null)
    {
        return cons(car($list1), $list2);
    }
    return cons(car($list1), append(cdr($list1), $list2));
}
