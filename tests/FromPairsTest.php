<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\AssociativeArrays\fromPairs;

class FromPairsTest extends TestCase
{
    public function testFromPairs()
    {
        $this->assertEquals([], fromPairs([]));

        $array1 = [['fred', 30], ['barney', 40]];
        $expected1 = ['fred' => 30, 'barney' => 40];
        $this->assertEquals($expected1, fromPairs($array1));

        $array2 = [['cat', 5], ['dog', 6], ['bird', 10]];
        $expected2 = ['cat' => 5, 'dog' => 6, 'bird' => 10];
        $this->assertEquals($expected2, fromPairs($array2));

        $array3 = [['cat', 5], ['dog', 6], ['cat', 11]];
        $expected3 = ['cat' => 11, 'dog' => 6];
        $this->assertEquals($expected3, fromPairs($array3));
    }
}
