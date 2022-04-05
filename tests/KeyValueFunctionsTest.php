<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\KeyValueFunctions\swapKeyValue;

/*class KeyValueFunctionsTest extends TestCase
{
   public function testSetGet()
    {
        $map = new \App\InMemoryKV(['key' => 10]);
        $map->set('key2', 'value2');
        swapKeyValue($map);
        $this->assertNull($map->get('key'));
        $this->assertEquals('key', $map->get(10));
        $this->assertEquals('key2', $map->get('value2'));
    }

    public function testSwap()
    {
        $map = new \App\InMemoryKV(['foo' => 'bar', 'bar' => 'zoo']);
        swapKeyValue($map);
        $this->assertEquals('foo', $map->get('bar'));
        $this->assertEquals('bar', $map->get('zoo'));
    }
}
*/
