<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Number\reverseNumber;

class ReverseNumberTest extends TestCase
{
    public function testReverse()
    {
        $this->assertSame(0, reverseNumber(0));
        $this->assertSame(21, reverseNumber(12));
        $this->assertSame(-37, reverseNumber(-73));
        $this->assertSame(-3432431, reverseNumber(-1342343));
    }
}
