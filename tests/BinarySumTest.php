<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\binarySum;

class BinarySumTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testBinarySum($expected, $first, $second)
    {
        $this->assertEquals($expected, binarySum($first, $second));
    }

    public function additionProvider()
    {
        return [
            ["0", "0", "0"],
            ["11", "01", "10"],
            ["10010", "1101", "101"],
            ["100", "010", "10"],
            ["11101110", "010110101", "0111001"],
        ];
    }
}
