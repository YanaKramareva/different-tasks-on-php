<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\flatten;

class FlattenTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testFlatten($expected, $array)
    {
        $this->assertEquals($expected, flatten($array));
    }

    public function additionProvider()
    {
        return [
            [[], []],
            [[1], [1]],
            [[1, 2, 3], [1, 2, 3]],
            [[], [[]]],
            [[1], [1, [], [[]]]],
            [[1, 'value', 4], [[1], ['key' => 'value', [4]]]],
            [[1, 2, 3, 3, 'value'], [1, [2, 3], [[3], ['key' => ['key' => 'value']]]]]
        ];
    }
}
