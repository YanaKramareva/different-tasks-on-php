<?php

/*
 * Реализуйте класс DatabaseConfigLoader,
 * который отвечает за загрузку конфигурации для базы данных. У класса следующий интерфейс:

Конструктор - принимает на вход путь, по которому нужно искать конфигурацию.
load($env) - метод, который грузит конфигурацию для конкретной среды окружения.
Она загружает файл database.{$env}.json, парсит его и возвращает результат наружу.

<?php

$loader = new DatabaseConfigLoader(__DIR__ . '/fixtures');
$config = $loader->load('production'); // loading database.production.json
// [
//     'host' => 'google.com',
//     'username' => 'postgres'
// ];
В этом классе и конфигурации реализована поддержка расширения.
 Если в загружаемом конфиге есть ключ extend, то нужно загрузить конфигурацию
 с этим именем (он соответствует $env). Далее конфигурации мержатся между собой так,
что приоритет имеет загруженный раньше. Более подробный пример посмотрите в тестах.

class DatabaseConfigLoader
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function load($name)
    {
        $filename = "database.{$name}.json";
        $raw = file_get_contents($this->path . '/' . $filename);
        $config = json_decode($raw, true);
        if (!isset($config['extend'])) {
            return $config;
        }
        $newName = $config['extend'];
        unset($config['extend']);
        return array_merge($this->load($newName), $config);
    }
}
 */

namespace App;

class DatabaseConfigLoader
{
    private array $path;

    public function __construct(string $dir)
    {
        $this->path = glob($dir . '/database*');
    }

    public function load(string $env): array
    {
        $fileName = array_filter($this->path, fn($item) => str_contains($item, $env));
        $fileContent = array_map(
            fn($item)=>json_decode(file_get_contents($item), true),
            $fileName
        );
        $collection = function ($fileName) use (&$collection) {
            $result = [];
            foreach ($fileName as $key => $value) {
                if (!is_array($value)) {
                    $result[$key] = $value;
                } else {
                    $result = array_merge($result, $collection($value));
                }
            }
            return $result;
        };
        $result = $collection($fileContent);
        if (array_key_exists('extend', $result)) {
            $newConfiguration = $this->load($result['extend']);
            unset($result['extend']);
            return array_merge($newConfiguration, $result);
        } else {
            return $result;
        }
    }
}
