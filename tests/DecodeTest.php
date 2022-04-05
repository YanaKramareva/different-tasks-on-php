<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Nrzi\decode;

class DecodeTest extends TestCase
{
    public function testDecode()
    {
        $this->assertEquals('', decode(''));
        $this->assertEquals('', decode('|'));
        $this->assertEquals('010110010', decode('¯|__|¯|___|¯¯'));
        $this->assertEquals('010011000110', decode('_|¯¯¯|_|¯¯¯¯|_|¯¯'));
        $this->assertEquals('010010000100111', decode('¯|___|¯¯¯¯¯|___|¯|_|¯'));
        $this->assertEquals('110010000100111', decode('|¯|___|¯¯¯¯¯|___|¯|_|¯'));
    }
}
