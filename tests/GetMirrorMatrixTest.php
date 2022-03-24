<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\getMirrorMatrix;

class GetMirrorMatrixTest extends TestCase
{
    public function testGetMirrorMatrix()
    {
        $arr1 = [
            ['he', 'xl', 'et', 'io'],
            ['in', 'my', 'hea', 'rt'],
            ['fo', 're', 've', 'r'],
            ['an', 'd', 'ev', 'er'],
        ];

        $expected1 = [
            ['he', 'xl', 'xl', 'he'],
            ['in', 'my', 'my', 'in'],
            ['fo', 're', 're', 'fo'],
            ['an', 'd', 'd', 'an'],
        ];

        $this->assertEquals($expected1, getMirrorMatrix($arr1));

        $arr2 = [
            [11, 12, 13, 14, 15, 16],
            [21, 22, 23, 24, 25, 26],
            [31, 32, 33, 34, 35, 36],
            [41, 42, 43, 44, 45, 46],
            [51, 52, 53, 54, 55, 56],
            [61, 62, 63, 64, 65, 66],
        ];

        $expected2 = [
            [11, 12, 13, 13, 12, 11],
            [21, 22, 23, 23, 22, 21],
            [31, 32, 33, 33, 32, 31],
            [41, 42, 43, 43, 42, 41],
            [51, 52, 53, 53, 52, 51],
            [61, 62, 63, 63, 62, 61],
        ];

        $this->assertEquals($expected2, getMirrorMatrix($arr2));
    }
}
