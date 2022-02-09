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

namespace App\Length;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

function length($items)
{
    if ($items === null) {
        return null;
    }
    if (cdr($items) === null) {
        return 1;
    }
    return 1 + length(cdr($items)) ;
}
