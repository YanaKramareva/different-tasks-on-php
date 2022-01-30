<?php

namespace App\Solution;
/*
 * В текущем задании представлен другой способ реализации пар.

Допишите функцию car() основываясь на том как работает функция cons().
Допишите функцию cdr() основываясь на том как работает функция cons().

 * function car(callable $pair)
{
    // BEGIN
    return $pair(function ($first, $second) {
        return $first;
    });
    // END
}

function cdr(callable $pair)
{
    // BEGIN
    return $pair(function ($first, $second) {
        return $second;
    });
    // END
}
 */
function cons($x, $y)
{
    return function ($func) use ($x, $y) {
        return $func($x, $y);
    };
}

function car(callable $pair)
{
    $func = function ($x, $y) {
        return $x;
    };
    return $pair($func);
}


function cdr(callable $pair)
{
    $func = function ($x, $y) {
        return $y;
    };
    return $pair($func);
}
