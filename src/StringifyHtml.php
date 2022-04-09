<?php

/*
 * Реализуйте функцию stringify($tag), которая принимает на вход тег и возвращает
 * его текстовое представление. Например:

Примеры
<?php

use function App\HTML\stringify;

$tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
$html = stringify($tag);
// <hr class="px-3" id="myid">


$tag = ['name' => 'div', 'tagType' => 'pair', 'body' => 'text2', 'id' => 'wow'];
$html = stringify($tag);
// <div id="wow">text2</div>
Внутри структуры тега есть три специальных ключа:

name - имя тега
tagType - тип тега, определяет его парность (pair) или одиночность (single)
body - тело тега, используется для парных тегов
Все остальное становится атрибутами тега и не зависит от того парный он или нет.

Подсказки
В этой задаче хорошо работает Collect

function buildAttrs(array $tag)
{
    return collect($tag)
        ->except(['name', 'tagType', 'body'])
        ->map(fn($value, $key) => " {$key}=\"{$value}\"")
        ->join('');
}

function stringify($tag)
{
    $attrs = buildAttrs($tag);

    $mapping = [
        'single' =>
            fn($tag) => "<{$tag['name']}{$attrs}>",
        'pair' =>
            fn($tag) => "<{$tag['name']}{$attrs}>{$tag['body']}</{$tag['name']}>"
    ];

    $build = $mapping[$tag['tagType']];
    return $build($tag);
}
 */

namespace App\HTML;

function stringifyHtml(array $tag): string
{
    $type = $tag['tagType'];
    $mapping = [
        'pair' =>
            function ($tag) {
                $pair = '';
                $info = '';
                $body = '';
                foreach ($tag as $key => $value) {
                    switch ($key) {
                        case 'name':
                            $pair = $value;
                            break;
                        case 'tagType':
                            break;
                        case 'body':
                            $body = ">{$value}<";
                            break;
                        default:
                            $info .= ' ' . $key . '=' . '"' . $value . '"';
                    }
                }
                return "<{$pair}{$info}{$body}/{$pair}>";
            },
        'single' =>
                function ($tag) {
                    $pair = '';
                    $body = '';
                    foreach ($tag as $key => $value) {
                        switch ($key) {
                            case 'name':
                                $pair = $value;
                                break;
                            case 'tagType':
                                break;
                            default:
                                $body .= ' ' . $key . '=' . '"' . $value . '"';
                        }
                    }
                    return "<{$pair}{$body}>";
                }
            ];
    return $mapping[$type]($tag);
}
