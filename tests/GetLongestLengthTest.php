<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\getLongestLength;

class GetLongestLengthTest extends TestCase
{
    public function testShortestRoad()
    {
        $this->assertEquals(7, getLongestLength('jabjcdel'));
        $this->assertEquals(4, getLongestLength('abcddef'));
        $this->assertEquals(3, getLongestLength('abbccddeffg'));
        $this->assertEquals(4, getLongestLength('abcd'));
        $this->assertEquals(9, getLongestLength('1234561qweqwer'));
        $this->assertEquals(9, getLongestLength('1234561qweqwerqer'));
        $this->assertEquals(0, getLongestLength(''));
    }
}
