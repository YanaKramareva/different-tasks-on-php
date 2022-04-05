<?php

/*
 * Создайте фабрику, которая принимает на вход путь до файла конфигурации в формате либо json либо yaml и
 *  возвращает объект класса Config.
 *  Конструктор класса Config принимает на вход массив с данными, полученными из конфигурационных файлов и
 * предоставляет к нему объектный доступ.

<?php

$config = ConfigFactory::build(__DIR__ . '/fixtures/test.yml');
$config->key; // value
print_r(get_class($config)); // Config

$config = ConfigFactory::build(__DIR__ . '/fixtures/test2.yaml');
$config->key; // another value
print_r(get_class($config)); // Config

$config2 = ConfigFactory::build(__DIR__ . '/fixtures/test.json');
$config2->key; // something else
Учтите что файлы формата YAML могут иметь разные расширения: yaml и yml. Фабрика должна работать с обоими.

src/parsers/JsonParser.php
Реализуйте класс, отвечающий за парсинг json. Используйте внутри json_decode, в котором второй параметр true.

src/parsers/YamlParser.php
Реализуйте класс, отвечающий за парсинг yaml. Для парсинга используется сторонний компонент со следующим интерфейсом:

<?php

Yaml::parse($data);
Подсказки
Получить расширение файла можно двумя способами, либо через pathinfo, либо через SplFileInfo
Чтение файлов делается с помощью функции file_get_contents

public static function build($filepath)
    {
        $mapping = [
            'yaml' => parsers\YamlParser::class,
            'yml' => parsers\YamlParser::class,
            'json' => parsers\JsonParser::class,
        ];
        $fileInfo = new \SplFileInfo($filepath);

        $parserClass = $mapping[$fileInfo->getExtension()];
        $parser = new $parserClass();
        $rawData = file_get_contents($fileInfo->getPathname());
        $data = $parser->parse($rawData);
        return new Config($data);
    }
}
 */

namespace App;

use App\Config;
use App\JsonParser;
use App\YamlParser;

class ConfigFactory
{
    private string $path;
    private string $extension;

    public function __construct($path)
    {
        $this->path = $path;
        $this->content = file_get_contents($path);
        $path_parts = pathinfo($path);
        $this->extension = $path_parts['extension'];
    }

    public function getType()
    {
        return $this->extension;
    }

    public function getContent()
    {
        return $this->content;
    }
    public static function build($path)
    {
        $mapping = [
            'json' => 'App\JsonParser',
            'yaml' => 'App\YamlParser',
            'yml' => 'App\YamlParser'
        ];

        $factory = new self($path);
        $className = $mapping[$factory->getType()];
        $class = new $className($factory->getContent());
        $array = $class->makeArray();
        return new Config($array);
    }

    public static function key()
    {
        return self::build()->__get();
    }
}
