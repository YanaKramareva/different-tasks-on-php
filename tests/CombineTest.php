<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\combine;

class CombineTest extends TestCase
{
    public function testDictionaryMerge1()
    {
        $actual = combine([
            [ 'a' => 1, 'b' => 2 ],
            [ 'a' => 3 ],
        ]);
        $expected = [ 'a' => [1, 3], 'b' => [2]];
        $this->assertEquals($expected, $actual);
    }

    public function testDictionaryMerge2()
    {
        $actual = combine([
            [ 'a' => 1, 'b' => 2, 'c' => 3 ],
            [ 'a' => 3, 'b' => 4],
            [ 'a' => 7, 'c' => 1, 'd' => 8 ],
        ]);
        $expected = [ 'a' => [1, 3, 7], 'b' => [2, 4], 'c' => [3, 1], 'd' => [8] ];
        $this->assertEquals($expected, $actual);
    }

    public function testDictionaryMerge3()
    {
        $actual = combine([
            [ 'a' => 1, 'b' => 2, 'c' => 3 ],
            [ 'a' => 3, 'b' => 4],
            [ 'a' => 3, 'b' => 2, 'd' => 5 ],
        ]);
        $expected = [ 'a' => [1, 3], 'b' => [2, 4], 'c' => [3], 'd' => [5] ];
        $this->assertEquals($expected, $actual);
    }

    public function testDictionaryMerge4()
    {
        $actual = combine([
            [ 'a' => 1, 'b' => 2, 'c' => 3 ],
            [],
            [ 'a' => 3, 'b' => 2, 'd' => 5],
            [ 'a' => 6 ],
            [ 'b' => 4, 'c' => 3, 'd' => 2 ],
            [ 'e' => 9 ],
        ]);
        $expected = [
            'a' => [1, 3, 6],
            'b' => [2, 4],
            'c' => [3],
            'd' => [5, 2],
            'e' => [9],
        ];
        $this->assertEquals($expected, $actual);
    }

    public function testDictionaryMerge5()
    {
        $expected = [];
        $this->assertEquals($expected, combine([[], [], [], []]));
    }
}
