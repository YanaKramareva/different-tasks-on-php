<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\findIndexOfNearest;

class FindIndexOfNearestTest extends TestCase
{
    public function testGetSameParity()
    {
        $this->assertNull(findIndexOfNearest([], 2));
        $this->assertEquals(0, findIndexOfNearest([10], 0));
        $this->assertEquals(1, findIndexOfNearest([10, 15], 20));
        $this->assertEquals(2, findIndexOfNearest([15, 10, 3, -5], 1));
        $this->assertEquals(2, findIndexOfNearest([15, 10, 3, -5], -1));
        $this->assertEquals(3, findIndexOfNearest([15, 10, 3, -5], -2));
    }
}
