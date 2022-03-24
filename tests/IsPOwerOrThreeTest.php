<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\isPowerOfThree;

class IsPOwerOrThreeTest extends TestCase
{
    public function testIsPowerOfThree()
    {
        $this->assertFalse(isPowerOfThree(0));
        $this->assertTrue(isPowerOfThree(1));
        $this->assertTrue(isPowerOfThree(3));
        $this->assertFalse(isPowerOfThree(5));
        $this->assertFalse(isPowerOfThree(6));
        $this->assertTrue(isPowerOfThree(9));
        $this->assertTrue(isPowerOfThree(27));
        $this->assertTrue(isPowerOfThree(81));
    }
}
