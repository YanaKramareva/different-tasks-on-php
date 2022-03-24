<?php

namespace App\LinkedList;

use App\Node;

/*
 * В этой практике вам предстоит поработать с односвязным списком. Для лучшего понимания задачи, прочитайте литературу данную в подсказках и изучите исходники файла src/Node.php, внутри которого находится реализация односвязного списка. И посмотрите тесты, там видно как список создается и используется.

src/LinkedList.php
Реализуйте функцию reverse($list), которая принимает на вход односвязный список и переворачивает его.

<?php

use App\Node;
use function App\LinkedList\reverse;

// (1, 2, 3)
$numbers = new Node(1, new Node(2, new Node(3)));
$reversedNumbers = reverse($numbers); // (3, 2, 1)
Подсказки
Односвязный список

function reverse(\App\Node $list)
{
    $reversedList = null;
    $current = $list;
    while ($current) {
        $reversedList = new Node($current->getValue(), $reversedList);
        $current = $current->getNext();
    }

    return $reversedList;
}
 */

function reverse($node)
{
    $reversedList = new Node($node->getValue());
    $current = $node -> getNext();

    while ($current) {
        $reversedList = new Node($current->getValue(), $reversedList);
        $current = $current->getNext();
    }
    return $reversedList;
}
