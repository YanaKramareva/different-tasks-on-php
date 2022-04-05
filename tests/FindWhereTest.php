<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Arrays\findWhere;

class FindWhereTest extends TestCase
{
    public function testFindWhere()
    {

        $data = [
            ['title' => 'Book of Fooos', 'author' => 'FooBar', 'year' => 1111],
            ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611],
            ['title' => 'The Tempest', 'author' => 'Shakespeare', 'year' => 1611],
            ['title' => 'Book of Foos Barrrs', 'author' => 'FooBar', 'year' => 2222],
            ['title' => 'Still foooing', 'author' => 'FooBar', 'year' => 3333],
            ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444],
        ];

        $expected1 = ['title' => 'Cymbeline', 'author' => 'Shakespeare', 'year' => 1611];
        $where1 = ['author' => 'Shakespeare', 'year' => 1611];
        $this->assertEquals($expected1, findWhere($data, $where1));

        $expected2 = null;
        $where2 = ['author' => 'undefined', 'year' => 1611];
        $this->assertEquals($expected2, findWhere($data, $where2));

        $expected3 = ['title' => 'Happy Foo', 'author' => 'FooBar', 'year' => 4444];
        $where3 = ['year' => 4444];
        $this->assertEquals($expected3, findWhere($data, $where3));
    }
}
