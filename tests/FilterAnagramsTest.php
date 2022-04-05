<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\filterAnagrams;

class FilterAnagramsTest extends TestCase
{
    public function testFilterAnagrams()
    {
        $this->assertEquals([], filterAnagrams('laser', ['lazing', 'lazy', 'lacer']));
        $this->assertEquals(['aabb', 'bbaa'], filterAnagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']));
        $this->assertEquals(['carer', 'racer'], filterAnagrams('racer', ['crazer', 'carer', 'racar', 'racer']));
    }
}
