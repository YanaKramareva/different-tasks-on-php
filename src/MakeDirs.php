<?php

namespace App\Implementations;

function mkdirs($path)
{
    return mkdir($path, 0700, true);
}
