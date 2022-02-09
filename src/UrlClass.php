<?php

namespace App;

/*
 * Упражнение 1
 * Реализуйте класс Url который описывает переданный в конструктор HTTP адрес и позволяет извлекать из него части:

<?php

$url = new Url('http://yandex.ru?key=value&key2=value2');
$url->getScheme(); // http
$url->getHost(); // yandex.ru
$url->getQueryParams();
// [
//     'key' => 'value',
//     'key2' => 'value2'
// ];
$url->getQueryParam('key'); // value
// второй параметр - значение по умолчанию
$url->getQueryParam('key2', 'lala'); // value2
$url->getQueryParam('new', 'ehu'); // ehu
Подсказка:

То, что нужно реализовать, описано в интерфейсе UrlInterface
Для разбора адреса воспользуйтесь функцией parse_url
Для разбора параметров запроса воспользуйтесь функцией parse_str
_______________________
Упражнение 2:

В данном упражнении вам предстоит реализовать класс Url, который позволяет извлекать из HTTP адреса, представленного строкой, его части.

Класс должен содержать конструктор и методы:

конструктор - принимает на вход HTTP адрес в виде строки.
getScheme() - возвращает протокол передачи данных (без двоеточия).
getHostName() - возвращает имя хоста.
getQueryParams() - возвращает параметры запроса в виде пар ключ-значение объекта.
getQueryParam() - получает значение параметра запроса по имени. Если параметр с переданным именем не существует, метод возвращает значение заданное вторым параметром (по умолчанию равно null).
equals($url) - принимает объект класса Url и возвращает результат сравнения с текущим объектом - true или false.

$url = new Url('http://yandex.ru:80?key=value&key2=value2');
$url->getScheme(); // 'http'
$url->getHostName(); // 'yandex.ru'
$url->getQueryParams();
// [
//     'key' => 'value',
//     'key2' => 'value2',
// ];
$url->getQueryParam('key'); // 'value'
// второй параметр - значение по умолчанию
$url->getQueryParam('key2', 'lala'); // 'value2'
$url->getQueryParam('new', 'ehu'); // 'ehu'
$url->getQueryParam('new'); // null
$url->equals(new Url('http://yandex.ru:80?key=value&key2=value2')); // true
$url->equals(new Url('http://yandex.ru:80?key=value')); // false

class Url
{
    private $url;
    private $queryParams;

    public function __construct($url)
    {
        $this->url = parse_url($url);
        $this->queryParams = [];

        if (isset($this->url['query'])) {
            parse_str($this->url['query'], $this->queryParams);
        }
    }

    public function getScheme()
    {
        return $this->url['scheme'];
    }

    public function getHostName()
    {
        return $this->url['host'];
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getQueryParam($key, $defaultValue = null)
    {
        return $this->queryParams[$key] ?? $defaultValue;
    }

    public function equals(Url $url)
    {
        return $this == $url;
    }
}
____________________
class Url implements UrlInterface
{
    // BEGIN
    private $scheme;
    private $host;
    private $queryParams;

    public function __construct($url)
    {
        $data = parse_url($url);

        $this->scheme = $data['scheme'];
        $this->host = $data['host'];
        $this->queryParams = $this->parseQuery($data['query']);
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getQueryParam($key, $defaultValue = null)
    {
        return $this->queryParams[$key] ?? $defaultValue;
    }

    public function getHost()
    {
        return $this->host;
    }

    private function parseQuery($query)
    {
        parse_str($query, $params);
        return $params;
    }
    // END
}
 */
class UrlClass implements UrlInterface
{
    private $scheme;
    private $host;
    private array $queryParam;
    private string $url;

    public function __construct($url)
    {
        $this->url = $url;
        $parsedUrl = parse_url($url);
        $this->scheme = $parsedUrl['scheme'];
        $this->host = $parsedUrl['host'];
        if (isset($parsedUrl['query'])) {
            $query = $parsedUrl['query'];
            parse_str($query, $output);
            $this->queryParam = $output;
        }
    }

    public function getScheme()
    {
        return $this->scheme;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getQueryParams()
    {
        if (isset($this->queryParam)) {
            return $this->queryParam;
        } else {
            return null;
        }
    }

    public function getQueryParam($key, $defaultValue = null)
    {
        return $this->queryParam[$key] ?? $defaultValue;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function equals($newUrl)
    {
        return $this->getUrl() === $newUrl->getUrl();
    }
}
