<?php

/*
 * Реализуйте функцию subRat(), которая производит вычитание рациональных чисел.
 * При этом (с точки зрения внутренней реализации) функция возвращает в качестве результата новую пару
 * (т.е. исходные пары, являющиеся параметрами функции, не изменяются).
Реализуйте функцию equalRat(), которая делает проверку двух рациональных чисел на равенство.
 */
namespace App\Rational;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

function makeRat($numer, $denom)
{
    return cons($numer, $denom);
}

function numer($rat)
{
    return car($rat);
}

function denom($rat)
{
    return cdr($rat);
}

// BEGIN (write your solution here)
function subRat($rat1, $rat2)
{
    return makeRat(numer($rat1) * denom($rat2) - numer($rat2) * denom($rat1), denom($rat1) * denom($rat2));
}
// END

function equalRat($rat1, $rat2): bool
{
    return numer($rat1) * denom($rat2) === numer($rat2) * denom($rat1);
}
