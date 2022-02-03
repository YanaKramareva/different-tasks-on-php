<?php
namespace App\Tests;

use App\Point;
use PHPUnit\Framework\TestCase;

class PointTest extends TestCase
{
    public function testTableValue()
    {
        $this->assertEquals('points', Point::$table);
    }
}
