<?php

/*
 * В JavaScript, вместо ассоциативного массива, используется встроенный тип данных объект.
 * Объекты поддерживают одновременно два способа обращения к ним: через точку (аналог -> в PHP) и через [], как в обычных массивах.

const obj = {
  key: 'value',
  key2: {
    key3: 'value3',
  },
};

obj.key; // 'value'
obj['key']; // 'value'

obj.key2['key3']; // 'value3'
obj.key2['key3'] = 'value2';
obj.key2.key3; // 'value2'

obj.key = 'value4';
obj.key; // 'value4'
В PHP то же самое можно эмулировать через объект, который реализует интерфейс ArrayAccess.
Кроме этого интерфейса, нужно реализовать магические методы __get и __set, которые дают обращаться к свойствам даже без их явного описания.

<?php

$items = [
    'key' => 'value',
    'key2' => [
        'key3' => 'value3'
    ]
];
$obj = new Obj($items);
$obj->key; // 'value'
$obj->key2->key3; // 'value3'
$obj['key']; // 'value'
$obj['key2']['key3']; // 'value3'

$obj['undefinedKey']; // null
$obj->undefinedKey; // null
src\Obj.php
Напишите класс Obj, который предоставляет к массиву (и всем вложенным массивам) объектный доступ.
Класс должен реализовывать два интерфейса: App\ObjInterface и ArrayAccess.
class Obj implements \ArrayAccess, ObjInterface
{
    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function __get($key)
    {
        $result = $this->data[$key] ?? null;
        if (!is_array($result)) {
            return $result;
        }
        $this->data[$key] = new self($result);
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset] ?? null;
    }
}

 */

namespace App;

use App\ObjInterface;
use ArrayAccess;

class Obj implements ObjInterface, ArrayAccess
{
    private array $object;

    public function __construct($array)
    {
        foreach ($array as $key => $value) {
            !is_array($value) ? $this->object[$key] = $value : $this->object[$key] = new Obj($value);
        }
    }
    public function __get($key)
    {
        return $this->object[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->object[$key] = $value;
    }

    public function offsetExists(mixed $key): bool
    {
        return isset($this->object[$key]);
    }

    public function offsetGet(mixed $key): mixed
    {
        return isset($this->object[$key]) ? $this->object[$key] : null;
    }

    public function offsetSet(mixed $key, mixed $value): void
    {
        $this->object[$key] = $value;
    }

    public function offsetUnset(mixed $key): void
    {
        unset($this->object[$key]);
    }
}
