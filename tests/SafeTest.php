<?php

namespace App\Tests;

use App\Safe;
use PHPUnit\Framework\TestCase;

class SafeTest extends TestCase
{
    public function testJsonDecode1()
    {
        $data = Safe\json_decode('{ "key": "value" }', true);
        $this->assertEquals(['key' => 'value'], $data);
    }

    public function testJsonDecode2()
    {
        $this->expectException(\Exception::class);
        $data = Safe\json_decode('{ key": "value" }', true);
    }
}