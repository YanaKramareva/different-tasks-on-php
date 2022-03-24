<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\calcInPolishNotation;

class CalcinPolishNotationTest extends TestCase
{
    public function testCalcInPolishNotation()
    {
        $this->assertEquals(15, calcInPolishNotation([1, 2, '+', 4, '*', 3, '+']));
        $this->assertEquals(4, calcInPolishNotation([1, 2, '+', 4, '*', 3, '/']));
        $this->assertEquals(1, calcInPolishNotation([7, 2, 3, '*', '-']));
        $this->assertEquals(6, calcInPolishNotation([1, 2, '+', 2, '*']));
        $this->assertEquals(0, calcInPolishNotation([1, 2, '+', 4, '*', 0, '/']));
    }
}
