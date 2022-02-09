<?php

namespace App\Reverse;

use function Php\Html\Tags\HtmlTags\append;
use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

function reverse($list)
{
    if ($list === null) {
        return null;
    }
    if (cdr($list) === null) {
        return car($list);
    }
    return reverse((cons(cdr($list), null)));
}
