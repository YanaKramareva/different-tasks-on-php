<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\length;
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;
use function App\Solution\select;

/*class SelectTest extends TestCase
{
    protected function setUp(): void
    {
        $dom1 = make();
        $dom2 = append($dom1, node('h1', 'scheme'));
        $dom3 = append($dom2, node('p', 'is a lisp'));
        $children1 = l(node('li', 'item 1'), node('li', 'item 2'));
        $dom4 = append($dom3, node('p', l(node('ul', $children1))));
        $children2 = l(node('li', 'item 1'), node('li', 'item 2'));
        $dom5 = append($dom4, node('ol', $children2));
        $dom6 = append($dom5, node('p', 'is a functional language'));
        $children3 = l(node('li', 'item'), node('li', 'item'));
        $dom7 = append($dom6, node('ul', $children3));
        $dom8 = append($dom7, node('div', l(node('p', 'another text'))));
        $dom9 = append($dom8, node('div', l(node('div', l(node('p', l(node('span', 'text'))))))));
        $dom10 = append($dom9, node('div', l(node('a', l(node('div', l(node('p', l(node('span', 'text'))))))))));
        $dom11 = append($dom10, node('h1', 'prolog'));
        $dom12 = append($dom11, node('p', 'is about logic'));
        $this->dom = append($dom12, node('span', l(node('ul', l(node('div', l(node('div', l(node('p'))))))))));
    }

    public function testSelect()
    {
        $this->assertEquals(3, length(select(l('ul'), $this->dom)));
        $this->assertEquals(2, length(select(l('p', 'ul', 'li'), $this->dom)));
        $this->assertEquals(2, length(select(l('div', 'div', 'p'), $this->dom)));
        $this->assertEquals(4, length(select(l('div', 'p'), $this->dom)));
        $this->assertEquals(1, length(select(l('div', 'a'), $this->dom)));
        $this->assertEquals(7, length(select(l('div'), $this->dom)));
    }
}
*/