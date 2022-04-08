<?php

namespace App\Tests;

use App\HTML2DivElement;
use PHPUnit\Framework\TestCase;

class HTML2ElementTest extends TestCase
{
    public function testClasses()
    {
        $class = 'one two';
        $div = new HTML2DivElement(['class' => $class]);
        $this->assertEquals($class, $div->getAttribute('class'));

        $div->addClass('small');
        $this->assertEquals('one two small', $div->getAttribute('class'));

        $div->addClass('small');
        $this->assertEquals('one two small', $div->getAttribute('class'));

        $div->removeClass('two');
        $this->assertEquals('one small', $div->getAttribute('class'));

        $div->toggleClass('small');
        $this->assertEquals('one', $div->getAttribute('class'));

        $div->toggleClass('small');
        $this->assertEquals('one small', $div->getAttribute('class'));
    }
}
