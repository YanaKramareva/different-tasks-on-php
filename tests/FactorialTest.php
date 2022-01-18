<?php


namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Factorial\factorial;
use function App\Divisor\smallestDivisor;

class FactorialTest extends TestCase
{
    /**
     * @dataProvider factorialProvider
     */
    public function testFactorial($expected, $number)
    {
        $this->assertEquals($expected, factorial($number));
    }

    public function factorialProvider()
    {
        return [
            [1, 0],
            [1, 1],
            [2, 2],
            [6, 3],
            [24, 4],
            [120, 5],
            [3628800, 10],
        ];
    }

    /**
     * @dataProvider smallestDivisorProvider
     */
    public function testSmallestDivisor($divisor, $number)
    {
        $this->assertEquals($divisor, \App\Factorial\smallestDivisor($number));
    }

    public function smallestDivisorProvider()
    {
        return [
            [1, 1],
            [3, 3],
            [2, 8],
            [3, 9],
            [2, 10],
            [17, 17]
        ];
    }
}
