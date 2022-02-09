<?php

namespace App\Normalizer;

/*
 * Реализуйте функцию normalize() которая принимает на вход список городов,
 *  производит внутри некоторые преобразования и возвращает структуру определенного формата.

Входные данные
<?php

$raw = [
    [
        'name' => 'istambul',
        'country' => 'turkey'
    ],
    [
        'name' => 'Moscow ',
        'country' => ' Russia'
    ],
    [
        'name' => 'iStambul',
        'country' => 'tUrkey'
    ],
    [
        'name' => 'antalia',
        'country' => 'turkeY '
    ],
    [
        'name' => 'samarA',
        'country' => '  ruSsiA'
    ],
];
Входная структура представляет из себя список городов, где каждый город
это ассоциативный массив с ключами name и country. Значения в этих ключах не нормализованы.
Они могут быть в любом регистре и содержать начальные и концевые пробелы.
Сами города могут дублироваться в рамках одной страны.

Результат
<?php

$actual = normalize($raw);
// $expected = [
//     'russia' => [
//         'moscow', 'samara'
//     ],
//     'turkey' => [
//         'antalia', 'istambul'
//     ]
// ];
Конечная структура — ассоциативный массив, в котором ключ это страна,
а значение — список имен городов отсортированный по именам. Сама структура отсортирована по странам.
Дублей городов в выходной структуре быть не должно, а сами страны и города должны быть записаны в нижнем регистре
 без ведущих и концевых пробелов.
function normalize($raw)
{
    return collect($raw)
        ->map(fn($value) =>
            array_map(fn($item) =>
                mb_strtolower($item), $value))
        ->map(fn($value) =>
            array_map(fn($item) =>
                trim($item), $value))
        ->mapToGroups(fn($item) =>
            [$item['country'] => $item['name']])
        ->map(fn($cities) =>
            $cities->unique()->sort()->values())
        ->sortKeys()
        ->toArray();
}
 */
function normalize(array $array)
{
    $obj = collect($array);
    $newObj = $obj->map(fn($item)=>['country' => str_replace(" ", '', strtolower($item['country'])),
  'name' => str_replace(" ", '', strtolower($item['name']))]);
    $newObj2 = $newObj-> sort() -> unique();
    $result = $newObj2 -> mapToGroups(fn($item) => [$item['country'] => $item['name']]);
    return $result -> toArray();
}
