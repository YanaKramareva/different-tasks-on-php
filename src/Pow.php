<?php

function digPow($n, $p)
{
    $arrayOfNumbers = str_split($n);
    $countOfNumbers = count($arrayOfNumbers) + $p;
    while ($p <= $countOfNumbers) {
        $arrayOfPow[] = $p++;
    }
    $arrayPow = array_map(function ($number, $pow) {
        return $number ** $pow;
    }, $arrayOfNumbers, $arrayOfPow);
    $sumOfPow = array_reduce($arrayPow, function ($item, $acc) {
        $acc = $acc + $item;
        return $acc;
    }, 0);
    return ($sumOfPow % $n) === 0 ? ($sumOfPow / $n) : (int)-1;
}
