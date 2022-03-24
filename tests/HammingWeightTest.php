<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\hammingWeight;

class HammingWeightTest extends TestCase
{
    public function testHammingWeight()
    {
        $this->assertEquals(0, hammingWeight(0));
        $this->assertEquals(1, hammingWeight(1));
        $this->assertEquals(2, hammingWeight(5));
        $this->assertEquals(2, hammingWeight(10));
        $this->assertEquals(4, hammingWeight(101));
        $this->assertEquals(6, hammingWeight(12345));
    }
}
