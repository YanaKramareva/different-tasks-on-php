<?php

namespace App;

/*
 * В DOM библиотеке, каждый класс наследник HTMLElement имеет определенный набор атрибутов,
 * которые относятся ко всему типу в целом. Например имя тега, парность и другое.
 *  Эта информация хорошо ложится на статические свойства, а использоваться они будут
 *  в суперклассе для построения текстового представления тега.

src\HTMLDivElement.php
Создайте класс HTMLDivElement и добавьте в него статическое свойство params с правильными значениями.
 Пример класса HTMLBrElement:

<?php

class HTMLBrElement extends HTMLElement
{
    protected static $params = [
        'name' => 'br',
        'pair' => false
    ];
}
src\HTMLElement.php
Реализуйте метод __toString(), который возвращает текстовое представление тега.
Для этого он использует данные из статического свойства $params определенного в подклассах.
Атрибуты в этой практике не предусмотрены. Если у объекта есть тело $this->body,
то оно должно устанавливаться между открывающим и закрывающим тегом.

<?php

$element = new HTMLBrElement();
echo $element; // => '<br>'

$element = new HTMLDivElement();
$element->setTextContent('hello!');
echo $element // => '<div>hello!</div>'
class HTMLElement
{
    private $body;

    public function setTextContent($body)
    {
        $this->body = $body;
    }

    // BEGIN
    public function __toString()
    {
        $params = static::$params;
        $openTag = "<{$params['name']}>";
        if (!$params['pair']) {
            return $openTag;
        }
        $closeTag = "</{$params['name']}>";

        return "{$openTag}{$this->body}{$closeTag}";
    }
    // END
}
 */

class HTML4Element
{
    private $body;

    public function setTextContent($body)
    {
        $this->body = $body;
    }

    // BEGIN (write your solution here)
    public static function getParams()
    {
        return static::$params;
    }

    public function __toString()
    {
        $params = self::getParams();
        if ($params['pair'] === true && isset($this->body)) {
            return "<{$params['name']}>{$this->body}</{$params['name']}>";
        }
        if ($params['pair'] === false && isset($this->body)) {
            return  "<{$params['name']}><{$this->body}>";
        } else {
            return "<{$params['name']}>";
        }
    }
    // END
}
