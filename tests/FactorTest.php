<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Factor\factor;
use function App\Double\double;

/*class FactorTest extends TestCase
{
    public function testFactor()
    {
        $multiTwo = factor(2);

        $this->assertEquals(4, $multiTwo(2));
        $this->assertEquals(20, $multiTwo(10));

        $multiTen = factor(10);

        $this->assertEquals(10, $multiTen(1));
        $this->assertEquals(0, $multiTen(0));
    }

    public function testDouble()
    {
        $inc = function ($arg) {
            return $arg + 1;
        };
        $inc2 = double($inc);

        $this->assertEquals(4, $inc2(2));
        $this->assertEquals(12, $inc2(10));

        $inc4 = double($inc2);
        $this->assertEquals(6, $inc4(2));
    }
}
*/
