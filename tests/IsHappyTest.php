<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Ticket\isHappy;

class IsHappyTest extends TestCase
{
    public function testIsHappy()
    {
        $this->assertTrue(isHappy('060006'));
        $this->assertTrue(isHappy('123321'));
        $this->assertTrue(isHappy('341800'));
        $this->assertTrue(isHappy('812146'));
        $this->assertFalse(isHappy('000001'));
        $this->assertFalse(isHappy('123567'));
        $this->assertFalse(isHappy('213612'));

        $this->assertFalse(isHappy('06'));
        $this->assertTrue(isHappy('33'));
    }
}
