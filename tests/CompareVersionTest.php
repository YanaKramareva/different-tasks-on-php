<?php

namespace App\Solution\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\compareVersion;

class CompareVersionTest extends TestCase
{
    public function testCompareVersion()
    {
        $this->assertEquals(-1, compareVersion("0.1", "0.2"));
        $this->assertEquals(1, compareVersion("0.2", "0.1"));
        $this->assertEquals(0, compareVersion("4.2", "4.2"));
        $this->assertEquals(-1, compareVersion("0.2", "0.12"));
        $this->assertEquals(-1, compareVersion("3.2", "4.12"));
        $this->assertEquals(1, compareVersion("3.2", "2.12"));
    }
}
