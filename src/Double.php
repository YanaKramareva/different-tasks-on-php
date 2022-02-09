<?php

namespace App\Double;

function double($func)
{
    return function ($num) use ($func) {
        return $func($func($num));
    };
}
