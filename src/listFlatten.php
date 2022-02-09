<?php

/*
 * Реализуйте функцию flatten(), которая делает плоским вложенный список.

Примеры
<?php

use function Php\Pairs\Data\Lists\l;

$list = l(1, 2, l(3, 5), l(l(4, 3), 2));

flatten($list); // (1, 2, 3, 5, 4, 3, 2)

Решение:
function flatten($list)
{
    return reduce(
        reverse($list),
        fn($element, $acc) => isList($element) ? concat(flatten($element), $acc) : cons($element, $acc),
        l()
    );
}
 */

namespace App\Flatten;

use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\make;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\reverse;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\isList;
use function Php\Pairs\Data\Lists\reduce;
use function Php\Pairs\Data\Lists\concat;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\toString as listToString;
use function PHPUnit\Framework\isEmpty;

function listFlatten($list)
{
    return reduce($list, function ($item, $acc) {

        isList($item) ? $acc = (concat($acc, listFlatten($item))) : $acc = reverse(append(reverse($acc), $item));
        return $acc;
    }, l());
}
