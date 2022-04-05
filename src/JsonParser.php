<?php

/*
 * src/parsers/JsonParser.php
Реализуйте класс, отвечающий за парсинг json. Используйте внутри json_decode, в котором второй параметр true.
class JsonParser
{
    public function parse($data)
    {
        return json_decode($data, true);
    }
}
 */
// BEGIN (write your solution here)
namespace App;

class JsonParser
{
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function makeArray()
    {
        return json_decode($this->content, true);
    }
}
// END
