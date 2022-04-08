<?php

namespace App\Tests;

use App\HTMLImgElement;
use PHPUnit\Framework\TestCase;

class HTMLImgElementTest extends TestCase
{
    public function test()
    {
        $img = new HTMLImgElement();
        $this->assertTrue($img->isValid());


        $img = new HTMLImgElement(['class' => 'rounded', 'src' => 'path/to/file']);
        $this->assertTrue($img->isValid());

        $img = new HTMLImgElement(['class' => 'rounded', 'href' => 'path/to/file']);
        $this->assertFalse($img->isValid());
    }
}
