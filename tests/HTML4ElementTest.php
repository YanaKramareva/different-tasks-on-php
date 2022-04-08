<?php

namespace App\Tests;

use App\HTML4Element;
use App\HTML4DivElement;
use PHPUnit\Framework\TestCase;

class HTML4ElementTest extends TestCase
{
    public function test()
    {
        $element = new HTML4Element();
        $expected = '<br>';
        $this->assertEquals($expected, $element->__toString());

        $element = new HTML4Element();
        $element->setTextContent('hello!');
        $expected = '<div>hello!</div>';
        $this->assertEquals($expected, $element->__toString());
    }
}
