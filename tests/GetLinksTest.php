<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\HTML\getLinks;

class GetLinksTest extends TestCase
{
    public function testGetLinks1()
    {
        $tags = [];
        $links = getLinks($tags);

        $expected = [];
        $this->assertEquals($expected, $links);
    }

    public function testGetLinks2()
    {
        $tags = [
            ['name' => 'p'],
            ['name' => 'a', 'href' => 'hexlet.io'],
            ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
        ];
        $links = getLinks($tags);

        $expected = [
            'hexlet.io',
            'hexlet.io/assets/logo.png'
        ];
        $this->assertEquals($expected, $links);
    }

    public function testGetLinks3()
    {
        $tags = [
            ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
            ['name' => 'div'],
            ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
            ['name' => 'h1']
        ];
        $links = getLinks($tags);

        $expected = [
            'hexlet.io/assets/logo.png',
            'hexlet.io/assets/style.css'
        ];
        $this->assertEquals($expected, $links);
    }
}
