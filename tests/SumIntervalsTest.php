<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\sumIntervals;

class SumIntervalsTest extends TestCase
{
    public function testSolution()
    {
        $this->assertEquals(0, sumIntervals([[5, 5]]));

        $this->assertEquals(7, sumIntervals([[3, 10]]));

        $this->assertEquals(100, sumIntervals([[-100, 0]]));

        $this->assertEquals(2, sumIntervals([
            [1, 2],
            [11, 12]
        ]));

        $this->assertEquals(5, sumIntervals([
            [2, 7],
            [6, 6]
        ]));

        $this->assertEquals(9, sumIntervals([
            [1, 5],
            [1, 10]
        ]));

        $this->assertEquals(11, sumIntervals([
            [1, 9],
            [7, 12],
            [3, 4]
        ]));

        $this->assertEquals(17, sumIntervals([
            [-7, 10],
            [1, 4],
            [2, 5],
        ]));

        $this->assertEquals(111, sumIntervals([
            [1, 5],
            [-10, 19],
            [1, 7],
            [16, 100],
            [5, 11],
            [-11, 100]
        ]));

        $this->assertEquals(7, sumIntervals([
            [1, 5],
            [2, 3],
            [7, 10],
        ]));
    }
}
