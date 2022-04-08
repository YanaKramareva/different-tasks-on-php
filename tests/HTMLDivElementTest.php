<?php

namespace App\Tests;

use App\HTMLDivElement;
use PHPUnit\Framework\TestCase;

class HTMLDivElementTest extends TestCase
{
    public function test()
    {
        $div = new HTMLDivElement();
        $expected = '<div></div>';
        $this->assertEquals($expected, $div->__toString());

        $div = new HTMLDivElement(['class' => 'w-75', 'id' => 'wop']);
        $expected = '<div class="w-75" id="wop"></div>';
        $this->assertEquals($expected, $div->__toString());

        $div = new HTMLDivElement(['name' => 'div', 'data-toggle' => 'true']);
        $div->setTextContent('Body');
        $expected = '<div name="div" data-toggle="true">Body</div>';
        $this->assertEquals($expected, $div->__toString());
    }
}
