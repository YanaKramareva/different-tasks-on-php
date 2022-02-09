<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Comparator\compare;

class ComparatorTest extends TestCase
{
    public function testCompare()
    {
        $actual1 = compare('ab#c', 'ab#c');
        $this->assertTrue($actual1);
        $actual2 = compare('ab##', 'c#d#');
        $this->assertTrue($actual2);
        $actual3 = compare('a#c', 'b');
        $this->assertFalse($actual3);
        $actual4 = compare('ac##lala#a', 'la#l#a#ala');
        $this->assertTrue($actual4);
        $actual5 = compare('c#lal##a#a', 'la#l#a#ala');
        $this->assertFalse($actual5);
        $actual6 = compare('#c', 'c');
        $this->assertTrue($actual6);
        $actual7 = compare('ad#c', 'ad##ad');
        $this->assertFalse($actual7);
    }
}
