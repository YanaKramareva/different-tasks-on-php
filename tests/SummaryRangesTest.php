<?php

namespace App;

use PHPUnit\Framework\TestCase;

use function App\Solution\summaryRanges;

class SummaryRangesTest extends TestCase
{
    public function testSummaryRanges()
    {
        $this->assertEquals([], summaryRanges([]));
        $this->assertEquals([], summaryRanges([1]));
        $this->assertEquals(["1->3"], summaryRanges([1, 2, 3]));
        $this->assertEquals(["0->2", "4->5"], summaryRanges([0, 1, 2, 4, 5, 7]));
        $this->assertEquals(['3->5', '8->10'], summaryRanges([1, 1, 3, 4, 5, -6, 8, 9, 10, 12, 14, 14]));
        $this->assertEquals(['110->112', '-5->-4'], summaryRanges([110, 111, 112, 111, -5, -4, -2, -3, -4, -5]));
        $this->assertEquals(
            ['110->112', '-5->-4', '2->5', '24->26'],
            summaryRanges([110, 111, 112, 111, -5, -4, -2, -3, -4, -5, 2, 3, 4, 5, 1, 1, -1, 4, 24, 25, 26])
        );
    }
}
