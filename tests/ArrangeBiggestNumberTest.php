<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\arrangeBiggestNumber;

class ArrangeBiggestNumberTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testArrangeBiggestNumber($expected, $numbers)
    {
        $this->assertEquals($expected, arrangeBiggestNumber($numbers));
    }

    public function additionProvider()
    {
        return [
            [null, []],
            ["998764543431", [1, 34, 3, 98, 9, 76, 45, 4]],
            ["654321", [1, 2, 3, 4, 5, 6]],
            ["481428385220219710610", [481, 428, 385, 202, 2, 197, 106, 10]],
            ["6054854654", [54, 546, 548, 60]],
            ["9908988444332412", [43, 44, 12, 324, 90, 9, 88, 89]]
        ];
    }
}
