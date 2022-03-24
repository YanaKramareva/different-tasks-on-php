<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\LengthOfLastWord\lengthOfLastWord;

class LenghLastWordTest extends TestCase
{
    public function testLengthOfLastWord()
    {
        $this->assertSame(0, lengthOfLastWord(''));
        $this->assertSame(2, lengthOfLastWord('hi'));
        $this->assertSame(5, lengthOfLastWord('man in black'));
        $this->assertSame(6, lengthOfLastWord('hello, world!'));
        $this->assertSame(6, lengthOfLastWord('hello, wOrLD!  '));
    }
}
