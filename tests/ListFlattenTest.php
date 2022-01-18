<?php
namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Flatten\listFlatten;
use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\toString as listToString;
use function App\Flatten\flatten;

class ListFlattenTest extends TestCase
{
    public function testFlattenSet1()
    {
        $list = l();

        $this->assertEquals('()', listToString(listFlatten($list)));
    }

    public function testFlattenSet2()
    {
        $list = l(1, 2, l(3, 5), l(l(4, 3), 2));

        $this->assertEquals('(1, 2, 3, 5, 4, 3, 2)', listToString(listFlatten($list)));
    }

    public function testFlattenSet3()
    {
        $list = l(l(1, l(5), l(), l(l(-3, 'hi'))), 'string', 10, l(l(l(5))));

        $this->assertEquals('(1, 5, -3, hi, string, 10, 5)', listToString(listFlatten($list)));
    }
}
