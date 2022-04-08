<?php

namespace App\Tests;

use App\ChildOfChild;
use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    public function test()
    {
        $obj = new ChildOfChild();
        $this->assertTrue($obj->isInstanceOf('App\Base'));
        $this->assertFalse($obj->isInstanceOf('Base'));
        $this->assertTrue($obj->isInstanceOf('App\FirstChild'));
        $this->assertTrue($obj->isInstanceOf('App\ChildOfChild'));
    }
}
