<?php

/*
 * src/parsers/YamlParser.php
Реализуйте класс, отвечающий за парсинг yaml. Для парсинга используется сторонний компонент со следующим интерфейсом:
class YamlParser
{
    public function parse($data)
    {
        return Yaml::parse($data);
    }
}
 */

namespace App;

use Symfony\Component\Yaml\Yaml;

// BEGIN (write your solution here)
class YamlParser
{
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function makeArray()
    {
        return Yaml::parse($this->content);
    }
}
// END
