<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\rotateLeft;
use function App\Solution\rotateRight;

/*class RotateLeftTest extends TestCase
{
    public function testRotate()
    {
        $matrix = [
            [1, 2, 3, 4, 5, 6],
            [7, 8, 9, 0, 1, 2],
            [3, 4, 5, 6, 7, 8],
            [9, 0, 1, 2, 3, 4],
        ];

        $left = [
            [6, 2, 8, 4],
            [5, 1, 7, 3],
            [4, 0, 6, 2],
            [3, 9, 5, 1],
            [2, 8, 4, 0],
            [1, 7, 3, 9],
        ];

       $rigth = [
            [9, 3, 7, 1],
            [0, 4, 8, 2],
            [1, 5, 9, 3],
            [2, 6, 0, 4],
            [3, 7, 1, 5],
            [4, 8, 2, 6],
        ];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($rigth, rotateRight($matrix));
    }

    /*public function testCharacterMatrix()
    {
        $matrix = [
            ['a', 'b', 'c', 'd'],
            ['aa', 'ab', 'ac', 'ad'],
            ['e', 'f', 'g', 'h'],
        ];

        $left = [
            ['d', 'ad', 'h'],
            ['c', 'ac', 'g'],
            ['b', 'ab', 'f'],
            ['a', 'aa', 'e'],
        ];

        $rigth = [
            ['e', 'aa', 'a'],
            ['f', 'ab', 'b'],
            ['g', 'ac', 'c'],
            ['h', 'ad', 'd'],
        ];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($rigth, rotateRight($matrix));
    }

    public function testOneRowMatrix()
    {
        $matrix = [
            [1, 2, 3, 4, 5, 6],
        ];
        $left = [[6], [5], [4], [3], [2], [1]];
        $rigth = [[1], [2], [3], [4], [5], [6]];

        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($rigth, rotateRight($matrix));
    }

    public function testOneColumnMatrix()
    {
        $matrix = [[1], [2], [3], [4], [5], [6]];
        $left = [[1, 2, 3, 4, 5, 6]];
        $rigth = [[6, 5, 4, 3, 2, 1]];
        $this->assertEquals($left, rotateLeft($matrix));
        $this->assertEquals($rigth, rotateRight($matrix));
    }
}
*/
