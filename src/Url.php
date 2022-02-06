<?php

/*
 * Реализуйте абстракцию для работы с урлами. Она должна извлекать и менять части адреса. Интерфейс:

make($url) - Конструктор. Создает урл.
setScheme($data, $scheme) - Сеттер. Меняет схему.
getScheme($data) - Селектор (геттер). Извлекает схему.
setHost($data, $host) - Сеттер. Меняет хост.
getHost($data) - Геттер. Извлекает хост.
setPath($data, $path) - Сеттер. Меняет строку запроса.
getPath($data) - Геттер. Извлекает строку запроса.
setQueryParam($data, $key, $value) - Сеттер. Устанавливает значение для параметра запроса.
getQueryParam($data, $paramName, $default = null) - Геттер. Извлекает значение для параметра запроса.
Третьим параметром функция принимает значение по умолчанию,
 которое возвращается тогда, когда в запросе не было такого параметра
toString($data) - Геттер. Преобразует урл в строковой вид.
<?php

$url = Url\make('https://hexlet.io/community?q=low');

Url\setScheme($url, 'http');
Url\toString($url); // 'http://hexlet.io/community?q=low'

Url\setPath($url, '/404');
Url\toString($url); // 'http://hexlet.io/404?q=low'

Url\setQueryParam($url, 'page', 5);
Url\toString($url); // 'http://hexlet.io/404?q=low&page=5'

Url\setQueryParam($url, 'q', 'high');
Url\toString($url); // 'http://hexlet.io/404?q=high&page=5'

Url\setQueryParam($url, 'q', null);
Url\toString($url); // 'http://hexlet.io/404?page=5'
Подсказки
Парсинг урла - parse_url
Парсинг параметров запроса - parse_str
Формирование строки запроса - http_build_query
Собирать данные в url придется самостоятельно

 */
/*namespace App\Url;

function make(string $url)
{
 return  parse_url($url);
}

function setScheme($url, $scheme)
{
    $url["scheme"] = $scheme;
    return $url;
}
function getScheme($url)
{
    return $url["scheme"];
}
function setHost($data, $host)
{
    $data["host"] = $host;
    return $data;
}

function getHost($data)
{
    return $data["host"];
}

function setPath($data, $path)
{
    $data["path"] = $path;
    return $data;

}
function getPath($data)
{
    return $data["path"];
}
function setQueryParam($data, $key, $value)
{
    $data["query"] = [$key => $value];
    return $data;
}
function getQueryParam($data, $paramName, $default = null)
{
return $data["query"] !== null ?? $default;
}

function toString($data)
{
    return implode("/", $data);
}

function getAllQueryParams($data)
{
    return $data['query'] ?? [];
}
*/