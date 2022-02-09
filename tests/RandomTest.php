<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Random;

/*class RandomTest extends TestCase
{
    public function testGetNext()
    {
        $seq = new Random(100);
        $result1 = $seq->getNext();
        $result2 = $seq->getNext();

        $this->assertNotEquals($result1, $result2);

        $seq2 = new Random(100);
        $result21 = $seq2->getNext();
        $result22 = $seq2->getNext();

        $this->assertEquals($result1, $result21);
        $this->assertEquals($result2, $result22);
    }

    public function testReset()
    {
        $seq = new Random(100);
        $result1 = $seq->getNext();
        $result2 = $seq->getNext();
        $result3 = $seq->getNext();

        $this->assertNotEquals($result1, $result2);

        $seq->reset();

        $result21 = $seq->getNext();
        $result22 = $seq->getNext();

        $this->assertEquals($result1, $result21);
        $this->assertEquals($result2, $result22);
    }
}
*/