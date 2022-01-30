<?php

namespace App\Tests;

use App\RationalClass;
use PHPUnit\Framework\TestCase;

class RationalClassTest extends TestCase
{
    public function test()
    {
        $rat1 = new RationalClass(3, 9);
        $this->assertEquals(3, $rat1->getNumer());
        $this->assertEquals(9, $rat1->getDenom());

        $rat2 = new RationalClass(10, 3);
        $this->assertEquals(new RationalClass(99, 27), $rat1->add($rat2));
        $this->assertEquals(new RationalClass(-81, 27), $rat1->sub($rat2));
    }
}
