<?php

namespace App\Points;

function makeDecartPoint($x, $y)
{
    return [
        'x' => $x,
        'y' => $y
    ];
}

function getX($point)
{
    return $point['x'];
}

function getY($point)
{
    return $point['y'];
}

function getQuadrant($point)
{
    $x = getX($point);
    $y = getY($point);

    if ($x > 0 && $y > 0) {
        return 1;
    } elseif ($x < 0 && $y > 0) {
        return 2;
    } elseif ($x < 0 && $y < 0) {
        return 3;
    } elseif ($x > 0 && $y < 0) {
        return 4;
    }

    return null;
}
