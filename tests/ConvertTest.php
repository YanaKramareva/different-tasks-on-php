<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Convert\convert;

/*class ConvertTest extends TestCase
{
    public function testConvert()
    {
        $tree1 = [];
        $tree2 = [['key', 'value']];
        $tree3 = [['key1', 'value1'], ['key2', 'value2']];
        $tree4 = [
            ['key2', 'value2'],
            ['anotherKey', [
                ['key2', false],
                ['innerKey', []],
            ]],
            ['key', null],
            ['anotherKey2', [
                ['wow', [['one', 'two'], ['three', 'four']]],
                ['key2', true],
            ]],
        ];

        $this->assertEquals([], convert($tree1));
        $this->assertEquals(['key' => 'value'], convert($tree2));
        $this->assertEquals(['key1' => 'value1', 'key2' => 'value2'], convert($tree3));
        $this->assertEquals([
            'key2' => 'value2',
            'anotherKey' => ['key2' => false, 'innerKey' => []],
            'key' => null,
            'anotherKey2' => [
                'wow' => ['one' => 'two', 'three' => 'four'],
                'key2' => true,
            ],
        ], convert($tree4));
    }
}
*/
