<?php

namespace App\Tests;

use App\Obj;
use PHPUnit\Framework\TestCase;

class ObjTest extends TestCase
{
    public function testObj()
    {
        $items = [
            'key' => 'value',
            'key2' => [
                'key3' => 'value3'
            ]
        ];
        $obj = new Obj($items);
        $this->assertEquals('value', $obj->key);
        $this->assertEquals('value3', $obj->key2->key3);
        $this->assertEquals('value', $obj['key']);
        $this->assertEquals('value3', $obj['key2']['key3']);
        $this->assertEquals(null, $obj->key2->key1);
        $this->assertEquals(null, $obj['kei']);

        $obj->key = 'another value';
        $this->assertEquals('another value', $obj->key);
        $this->assertEquals('another value', $obj['key']);

        $obj->key2->key3 = 'lolo';
        $this->assertEquals('lolo', $obj->key2->key3);
        $this->assertEquals('lolo', $obj['key2']['key3']);
    }
}
