<?php

/*namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Rectangle\makeRectangle;
use function App\Rectangle\containsOrigin;
use function App\Points\makeDecartPoint;

class RectangleTest extends TestCase
{
    public function test()
    {
        $p = makeDecartPoint(0, 1);
        $rectangle = makeRectangle($p, 4, 5);
        $this->assertFalse(containsOrigin($rectangle));

        $p2 = makeDecartPoint(-4, 3);
        $rectangle2 = makeRectangle($p2, 5, 4);
        $this->assertTrue(containsOrigin($rectangle2));

        $rectangle3 = makeRectangle($p2, 2, 2);
        $this->assertFalse(containsOrigin($rectangle3));

        $rectangle4 = makeRectangle($p2, 5, 2);
        $this->assertFalse(containsOrigin($rectangle4));

        $rectangle5 = makeRectangle($p2, 2, 4);
        $this->assertFalse(containsOrigin($rectangle5));

        $rectangle6 = makeRectangle($p2, 4, 3);
        $this->assertFalse(containsOrigin($rectangle6));
    }
}
*/