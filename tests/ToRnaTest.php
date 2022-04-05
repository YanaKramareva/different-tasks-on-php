<?php

namespace App;

use PHPUnit\Framework\TestCase;

use function App\Solution\toRna;

class ToRnaTest extends TestCase
{
    public function testToRna()
    {
        $this->assertEquals('G', toRna('C'));
        $this->assertEquals('C', toRna('G'));
        $this->assertEquals('A', toRna('T'));
        $this->assertEquals('U', toRna('A'));
        $this->assertEquals('UGCACCAGAAUU', toRna('ACGTGGTCTTAA'));
    }
}
