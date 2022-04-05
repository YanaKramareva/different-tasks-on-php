<?php

namespace App;

use PHPUnit\Framework\TestCase;

use function App\Solution\scrabble;

class ScrubbleTest extends TestCase
{
    public function testScrabble()
    {
        $this->assertTrue(scrabble('rkqodlw', 'world'));
        $this->assertTrue(scrabble('begsdhhtsexoult', 'hexlet'));
        $this->assertFalse(scrabble('katas', 'steak'));
        $this->assertTrue(scrabble('scriptjava', 'javascript'));
        $this->assertTrue(scrabble('scriptingjava', 'javascript'));
        $this->assertFalse(scrabble('scriptjavest', 'javascript'));
        $this->assertFalse(scrabble('', 'javascript'));
        $this->assertTrue(scrabble('scriptingjava', 'JavaScript'));
    }
}
