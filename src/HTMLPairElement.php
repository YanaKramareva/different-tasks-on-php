<?php

namespace App;

/*
 * Реализуйте класс HTMLPairElement (наследуется от HTMLElement),
 * который отвечает за генерацию представления парных элементов и работу с телом.
 *  Реализуйте следующий интерфейс:

<?php
public function __toString();
public function getTextContent();
public function setTextContent(string $body);
src\HTMLDivElement.php
Реализуйте класс HTMLDivElement, который описывает собой парный тег <div>.

<?php

$div = new HTMLDivElement(['name' => 'div', 'data-toggle' => 'true']);
$div->setTextContent('Body');
echo $div; // '<div name="div" data-toggle="true">Body</div>'

 */

use App\HTMLElement;

// BEGIN (write your solution here)
class HTMLPairElement extends HTMLElement
{
    private $body = '';

    public function __toString()
    {
        $attrLine = $this->stringifyAttributes();
        $body = $this->getTextContent();
        $tagName = $this->getTagName();
        return "<{$tagName}{$attrLine}>{$body}</{$tagName}>";
    }

    public function getTextContent()
    {
        return $this->body;
    }

    public function setTextContent(string $body)
    {
        $this->body = $body;
    }
}
// END
