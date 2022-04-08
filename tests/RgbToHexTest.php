<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\hexToRgb;
use function App\Solution\rgbToHex;

class RgbToHexTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testHexToRgb(string $hex, int $r, int $g, int $b): void
    {
        $this->assertEquals(['r' => $r, 'g' => $g, 'b' => $b], hexToRgb($hex));
    }

    /**
     * @dataProvider dataProvider
     */
    public function testRgbToHex(string $hex, int $r, int $g, int $b): void
    {
        $this->assertEquals($hex, (rgbToHex($r, $g, $b)));
    }

    public function dataProvider()
    {
        return [
            ['#000000', 0, 0, 0],
            ['#ffffff', 255, 255, 255],
            ['#00840c', 0, 132, 12],
            ['#24ab00', 36, 171, 0],
            ['#543fab', 84, 63, 171],
            ['#f700de', 247, 0, 222],
            ['#c60123', 198, 1, 35],
        ];
    }
}
