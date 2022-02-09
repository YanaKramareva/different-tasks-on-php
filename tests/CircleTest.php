<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Circle;

class CircleTest extends TestCase
{
    public function testGetArea()
    {
        $circle = new Circle(1);
        $this->assertEqualsWithDelta(pi(), $circle->getArea(), 0.1);
        $circle2 = new Circle(3);
        $this->assertEqualsWithDelta(28.2, $circle2->getArea(), 0.1);
    }

    public function testGetCircumference()
    {
        $circle = new Circle(1);
        $this->assertEqualsWithDelta(6.2, $circle->getCircumference(), 0.1);
        $circle2 = new Circle(3);
        $this->assertEqualsWithDelta(18.8, $circle2->getCircumference(), 0.1);
    }
}
