<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\getSameParity;

class GetSameParityTest extends TestCase
{
    public function testGetSameParity()
    {
        $this->assertEquals([], getSameParity([]));
        $this->assertEquals([5, 1, -3], getSameParity([5, 0, 1, -3, 10]));
        $this->assertEquals([2, 0, 10, -2], getSameParity([2, 0, 1, -3, 10, -2]));
        $this->assertEquals([2, 0, 10, -2], getSameParity([2, 0, 10, -2]));
        $this->assertEquals([-5, 1, -3], getSameParity([-5, 0, 1, -3, 10]));
    }
}
