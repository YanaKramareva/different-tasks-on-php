<?php

namespace App\Tests;

use App\Application;
use PHPUnit\Framework\TestCase;
use App\Sanitizer;
use App\SanitizerStripTagsDecorator;

class ApplicationTest extends TestCase
{
    public function test()
    {
        $sanitizer = new Sanitizer();
        $decorated = new SanitizerStripTagsDecorator($sanitizer);
        $app = new Application($decorated);
        $result = $app->run('<p>text<p>');
        $this->assertEquals('text', $result);

        $result = $app->run('  <hr>   another text ');
        $this->assertEquals('another text', $result);
    }
}
