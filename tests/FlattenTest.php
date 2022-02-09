<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\flatten;

/*class FlattenTest extends TestCase
{

    public function testFlatten($actual, $equal)
    {
        $this->assertEquals($equal, flatten($actual));
    }

    public function arrays()
    {
        return [
            [[], []],
            [[1, 2, [3, 5], [[4, 3], 4], 10], [1, 2, 3, 5, 4, 3, 4, 10]],
            [[[1, [5], [], [[-3, 'hi']]], 'string', 10, [[[5]]]], [1, 5, -3, 'hi', 'string', 10, 5]],
            [[null, '\n', [[true => false]]], [null, '\n', false]],
        ];
    }
}
*/