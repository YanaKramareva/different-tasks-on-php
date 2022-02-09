<?php

namespace App\Converter;

/*
 * Реализуйте функцию toStd(), которая принимает на вход ассоциативный массив и возвращает объект типа stdClass такой же структуры. Выполните задачу, проставляя ключи и значения вручную без использования преобразования типа.

Примеры
<?php

$data = [
    'key' => 'value',
    'key2' => 'value2',
];
$config = toStd($data);

$config->key; // value
$config->key2; // value2
Примечания
Это задание можно решить простым преобразованием типа (в object), но это не спортивно)
Подсказки
Вам понадобится динамическое обращение к свойствам:

<?php

$name = 'key';
$obj->$name;
*/

function toStd($data)
{
    $std = new \stdClass();
    foreach ($data as $key => $value) {
        $std->$key = $value;
    }

    return $std;
}
