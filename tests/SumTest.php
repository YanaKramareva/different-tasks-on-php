<?php

namespace App\tests;

use PHPUnit\Framework\TestCase;

use function App\Product\product;
use function App\Sum\sum;

/*class SumTest extends TestCase
{
    public function testSum()
    {
        $identity = function ($num) {
            return $num;
        };
        $this->assertEquals(1, sum(1, 1, $identity));
        $this->assertEquals(6, sum(1, 3, $identity));
        $this->assertEquals(27, sum(8, 10, $identity));
    }

    public function testProduct()
    {
        $m = function ($num1, $num2) {
            return $num1 - $num2;
        };
        $this->assertEquals(1, product(1, 1, $m));
        $this->assertEquals(-1, product(1, 2, $m));
        $this->assertEquals(-6, product(3, 5, $m));

        $func = function ($num1, $num2) {
            return $num1 * $num2 + $num2;
        };
        $this->assertEquals(15, product(1, 3, $func));
        $this->assertEquals(40, product(2, 4, $func));
    }
}
*/
