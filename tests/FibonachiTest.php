<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\fib;

class FibonachiTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testFib($expected, $number)
    {
        $this->assertEquals($expected, fib($number));
    }

    public function additionProvider()
    {
        return [
            [0, 0],
            [1, 1],
            [1, 2],
            [2, 3],
            [3, 4],
            [5, 5],
            [55, 10]
        ];
    }
}
