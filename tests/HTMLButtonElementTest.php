<?php

namespace App\Tests;

use App\HTMLButtonElement;
use PHPUnit\Framework\TestCase;

class HTMLButtonElementTest extends TestCase
{
    public function test()
    {
        $button = new HTMLButtonElement();
        $this->assertFalse($button->isValid());

        $button = new HTMLButtonElement(['class' => 'rounded', 'type' => 'submit']);
        $this->assertTrue($button->isValid());

        $button = new HTMLButtonElement(['name' => 'button', 'type' => 'button']);
        $this->assertTrue($button->isValid());

        $button = new HTMLButtonElement(['type' => 'button', 'name' => 'button']);
        $this->assertTrue($button->isValid());

        $button = new HTMLButtonElement(['class' => 'rounded', 'type' => 'link']);
        $this->assertFalse($button->isValid());

        $button = new HTMLButtonElement(['class' => 'rounded']);
        $this->assertFalse($button->isValid());

        $button = new HTMLButtonElement(['class' => 'rounded', 'href' => 'path/to/file']);
        $this->assertFalse($button->isValid());

        $button = new HTMLButtonElement(['type' => 'button', 'href' => 'path/to/file']);
        $this->assertFalse($button->isValid());
    }
}
