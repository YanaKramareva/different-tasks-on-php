<?php

namespace App\Tests;

use App\InMemoryKV;
use PHPUnit\Framework\TestCase;

class InMemoryKVTest extends TestCase
{
    public function testSetGet()
    {
        $map = new InMemoryKV(['key' => 10]);
        $this->assertTrue($map instanceof \App\KeyValueStorageInterface);
        $this->assertTrue($map instanceof \Serializable);
    }

    public function testSerializeUnserialize()
    {
        $data = ['key' => 10, 'key2' => 'value'];

        $map = new InMemoryKV($data);
        $serialized = json_encode($data);
        $this->assertEquals($serialized, $map->serialize());

        $map = new InMemoryKV();
        $map->unserialize($serialized);
        $this->assertEquals($data, $map->toArray());
    }
}
