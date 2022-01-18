<?php
/*
 * JavaScript содержит метод JSON.stringify() для приведения к строке любого значения. Он работает следующим образом:

JSON.stringify('hello'); // "hello" - для строковых значений добавляются кавычки
JSON.stringify(true);    // true    - значение приведено к строке, но без кавычек
JSON.stringify(5);       // 5

const data = { hello: 'world', is: true, nested: { count: 5 } };
JSON.stringify(data); // {"hello":"world","is":true,"nested":{"count":5}}

JSON.stringify(data, null, 2); // null, 2 - указывают на два пробела перед ключом
// ключам добавляются кавычки
// в конце каждой строчки (линии) добавляется запятая, если имеется значение ниже
// {
//   "hello": "world",
//   "is": true,
//   "nested": {
//     "count": 5
//   }
// }
Stringify.php
Реализуйте функцию, похожую на JSON.stringify(), но со следующими отличиями:

ключи и строковые значения должны быть без кавычек;
строчка (линия) в строке заканчивается самим значением, без запятой.
Синтаксис:

stringify(value[, replacer[, spacesCount]])
Параметры:

value
Значение, преобразуемое в строку.
replacer, необязательный
Строка – отступ для ключа; Значение по умолчанию – один пробел.
spacesCount, необязательный
Число – количество повторов отступа ключа. Значение по умолчанию – 1.
<?php

stringify('hello'); // hello – значение приведено к строке, но не имеет кавычек
stringify(true);    // true
stringify(5);       // 5

$data = [
    'hello' => 'world',
    'is' => true,
    'nested' => ['count' => 5],
];

stringify($data); // то же самое что stringify(data, ' ', 1);
// {
//  hello: world
//  is: true
//  nested: {
//   count: 5
//  }
// }

stringify($data, '|-', 2);
// Символ, переданный вторым аргументом повторяется столько раз, сколько указано третьим аргументом.
// {
// |-|-hello: world
// |-|-is: true
// |-|-nested: {
// |-|-|-|-count: 5
// |-|-}
// }
Подсказки
чтобы лучше понять как работает JSON.stringify(), запускайте его с разными данными и параметрами в консоли браузера.

проверки в тестах идут от простого к сложному:

проверка на примитивных типах;
проверка на "плоских" данных;
проверка на "вложенных" данных.
Реализуйте функцию так же пошагово, проверяя, что изменения для сложных кейсов не сломали более простые;

документация по JSON.stringify на MDN.
 */

namespace App\Stringify;

function toString($value)
{
    return trim(var_export($value, true), "'");
}
function iter($replacer, $spacesCount, $depth = '')
{
    if ($spacesCount > 1) {
        $depth =  $depth.iter($replacer, $spacesCount-1);
    }
    return $depth.$replacer;
}

function stringify($value, $replacer = ' ', $spacesCount = 1)
{
    if (is_bool($value) || is_int($value) || is_float($value) || is_string($value)){
        return toString($value);
    }
    $newReplacer = iter($replacer, $spacesCount);
    $encode= array_map(function ($k, $v) use ($newReplacer, $spacesCount, $replacer) {
        is_array($v) || is_object($v)? $newValue = stringify($v, iter($replacer, $spacesCount, $newReplacer)): $newValue = $v;
        return $newReplacer. toString($k).": " .toString($newValue). PHP_EOL;
    }, array_keys($value), array_values($value));
    $string = implode($encode);
    return "{".PHP_EOL. $string."}";
}