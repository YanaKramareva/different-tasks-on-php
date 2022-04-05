<?php

/*
 * В программировании, для некоторых задач распространены key-value базы данных.
 * Внешне они работают по принципу ассоциативных массивов, но живут как отдельные программы
 * и умеют делать много полезных штук: например, сохранять данные на диск,
 *  переносить данные между машинами в сети и тому подобное.

В этой задаче реализована подобная база данных в виде класса FileKV,
 который сохраняет свои данные на диске в указанном файле. Она имеет следующий интерфейс:

<?php

$map = new FileKV('/path/to/dbfile');
// Получение значения по ключу
$map->get('key'); // key
$map->get('unkonwnkey'); // null
// Получение значения и дефолт
$map->get('unkonwnkey', 'default value'); // default value
// Установка и обновление ключа
$map->set('key2', 'value2');
$map->get('key2'); // value2
// Удаление ключа
$map->unset('key2'); // value2
$map->get('key2'); // null
$map->set('key', 'value'); // null
// Возврат всех данных из базы
$map->toArray(); // ['key' => 'value']
В целях тестирования бывает полезно иметь реализацию такой базы данных, которая хранит данные в памяти,
а не во внешнем хранилище. Это позволяет легко сбрасывать состояние между тестами и не замедлять их.

src/InMemoryKV.php
Реализуйте класс InMemoryKV, который представляет собой in-memory key-value хранилище.
 Данные внутри него хранятся в обычном ассоциативном массиве. Интерфейс этого класса совпадает
 с FileKV за исключением конструктора. Конструктор InMemoryKV принимает на вход массив,
который становится начальным значением базы данных.

<?php

use App\InMemoryKV;

$map = new InMemoryKV(['key' => 10]);
$map->get('key'); // 10
src/KeyValueFunctions.php
Реализуйте функцию swapKeyValue(), которая принимает на вход объект базы данных и меняет
в нём ключи и значения местами.

swapKeyValue — полиморфная функция, она может работать с любой реализацией key-value,
 имеющей такой же интерфейс.

<?php

$map = new \App\InMemoryKV(['key' => 10]);
$map->set('key2', 'value2');
swapKeyValue($map);
$map->get('key'); // null
$map->get(10); // key
$map->get('value2'); // key2

function swapKeyValue($map)
{
    $data = $map->toArray();
    array_walk($data, fn($value, $key) => $map->unset($key));
    array_walk($data, fn($value, $key) => $map->set($value, $key));
}
 */

namespace App\KeyValueFunctions;

use App\InMemoryKV;

function swapKeyValue(&$object)
{
    $array = $object->toArray();
    $reversedArray = array_flip($array);
    $keys = array_keys($array);
    array_walk($keys, fn($key)=>$object->unset($key));
    array_map(fn($key, $value)=>$object->set($key, $value), array_keys($reversedArray), $reversedArray);
}
