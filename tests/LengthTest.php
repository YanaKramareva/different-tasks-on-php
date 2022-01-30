<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\toString;
use function App\Length\length;
use function App\Append\append;
use function App\Reverse\reverse;

class LengthTest extends TestCase
{
    public function testLength()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $this->assertEquals(3, length($list));
        $list2 = null;
        $this->assertEquals(0, length($list2));
    }

    public function testAppend()
    {
        $list = cons(1, cons(2, null));
        $list2 = cons(3, cons(4, null));
        $expected = toString(cons(1, cons(2, cons(3, cons(4, null)))));
        $this->assertEquals($expected, toString(append($list, $list2)));
    }

    public function testReverse()
    {
        $list = cons(1, cons(2, cons(3, null)));
        $expected = toString(cons(3, cons(2, cons(1, null))));
        $this->assertEquals($expected, toString(reverse($list)));
    }
}
