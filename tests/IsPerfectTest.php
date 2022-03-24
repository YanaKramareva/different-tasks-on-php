<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Numbers\isPerfect;

class IsPerfectTest extends TestCase
{
    public function testIsPerfect()
    {
        $this->assertTrue(isPerfect(6));
        $this->assertTrue(isPerfect(28));
        $this->assertTrue(isPerfect(496));
        $this->assertTrue(isPerfect(8128));
        $this->assertFalse(isPerfect(-6));
        $this->assertFalse(isPerfect(-28));
        $this->assertFalse(isPerfect(44));
        $this->assertFalse(isPerfect(0));
        $this->assertFalse(isPerfect(10));
        $this->assertFalse(isPerfect(44));
        $this->assertFalse(isPerfect(2556));
    }
}
