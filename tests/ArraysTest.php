<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\getChunked;

/*class ArraysTest extends TestCase
{
    public function testGetChunked()
    {
        $array1 = ['a', 'b', 'c', 'd'];
        $size1 = 2;
        $expected1 = [['a', 'b'], ['c', 'd']];
        $this->assertEquals($expected1, getChunked($array1, $size1));

        $array2 = ['a', 'b', 'c', 'd'];
        $size2 = 3;
        $expected2 = [['a', 'b', 'c'], ['d']];
        $this->assertEquals($expected2, getChunked($array2, $size2));

        $this->assertEquals([], getChunked([], 4));

        $this->assertEquals([['a']], getChunked(['a'], 2));

        $array5 = ['a', 'b', 'c', 'd', 'e', 'f'];
        $size5 = 2;
        $expected5 = [['a', 'b'], ['c', 'd'], ['e', 'f']];
        $this->assertEquals($expected5, getChunked($array5, $size5));
    }
}
*/
