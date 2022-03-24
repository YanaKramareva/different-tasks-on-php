<?php

namespace App\Rectangle;

use function App\Points\makeDecartPoint;
use function App\Points\getX;
use function App\Points\getY;
use function App\Points\getQuadrant;

function makeRectangle($startPoint, $width, $height)
{
    $rectangle['startPoint'] = ['x' => getX($startPoint), 'y' => getY($startPoint)];
    $rectangle['width'] = $width;
    $rectangle['height'] = $height;
    return $rectangle;
}

function getStartPoint($rectangle)
{
    $x = getX($rectangle['startPoint']);
    $y = getY($rectangle['startPoint']);
    return [$x, $y];
}


function getWidth($rectangle)
{
    return $rectangle['width'];
}

function getHeight($rectangle)
{
    return $rectangle['height'];
}

function containsOrigin($rectangle)
{
    $rectangle['a'] = ['x' => getX(getStartPoint($rectangle)),
        'y' => getY(getStartPoint($rectangle)) - getHeight($rectangle)];
    $rectangle['b'] = ['x' => getX(getStartPoint($rectangle)),
        'y' => getY(getStartPoint($rectangle))];
    $rectangle['c'] = ['x' => getX(getStartPoint($rectangle)) + getWidth($rectangle),
        'y' => getY(getStartPoint($rectangle))];
    $rectangle['d'] = ['x' => getX(getStartPoint($rectangle)) + getWidth($rectangle),
        'y' => getY(getStartPoint($rectangle)) - getHeight($rectangle)];
    return getQuadrant($rectangle['b']) === 2 && getQuadrant($rectangle['d'] === 4);
}
