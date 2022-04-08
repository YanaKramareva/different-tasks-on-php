<?php

namespace App;

/*
 * Реализуйте класс HTMLHrElement (наследуется от HTMLElement),
 * который отвечает за представление тега <hr>.
 *  Внутри класса определите функцию __toString(), которая возвращает текстовое представление тега.

<?php

$hr = new HTMLHrElement();
echo $hr; // <hr>

$hr = new HTMLHrElement(['class' => 'w-75', 'id' => 'wop']);
echo $hr; // '<hr class="w-75" id="wop">';
src/HTMLElement.php
Реализуйте метод stringifyAttributes(), который формирует строчку для аттрибутов.
 Используйте этот метод в наследнике для формирования тега.

Подсказки
В практике доступен collect
 */

use App\HTMLElement;

class HTMLHrElement extends HTMLElement
{
    public function __toString()
    {
        $body = $this->stringifyAttributes();
        return "<hr{$body}>";
    }
}
