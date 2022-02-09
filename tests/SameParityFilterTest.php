<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\toString as listToString;
use function App\SameParityFilter\sameParity;

/*class SameParityFilterTest extends TestCase
{
    public function testUnionDataSet1()
    {
        $result = sameParity(l(5, 0, 1, -3, 10));
        $this->assertEquals(listToString(l(5, 1, -3)), listToString($result));
        $result2 = sameParity(l(2, 0, 1, -3, 10, -2));
        $this->assertEquals(listToString(l(2, 0, 10, -2)), listToString($result2));
        $result3 = sameParity(l(-1, 0, 1, -3, 10, -2));
        $this->assertEquals(listToString(l(-1, 1, -3)), listToString($result3));
        $result4 = sameParity(l(10, -1.5, 1.3, -3, 25, -2));
        $this->assertEquals(listToString(l(10, -2)), listToString($result4));
        $result5 = sameParity(l());
        $this->assertEquals(listToString(l()), listToString($result5));
    }
}
*/
