<?php

/*
 * Реализуйте функцию getLinks($tags), которая принимает на вход список тегов, находит среди них теги a,
 *  link и img, а затем извлекает ссылки и возвращает список ссылок.
 *  Теги подаются на вход в виде массива, где каждый элемент это тег. Тег имеет следующую структуру:

name - имя тега.
href или src - атрибуты. Атрибуты зависят от тега: img - src, a - href, link - href.
<?php

use function App\HTML\getLinks;

$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];
$links = getLinks($tags);
// [
//     'hexlet.io/assets/logo.png',
//     'hexlet.io/assets/style.css'
// ];

function getLinks($tags)
{
    $mapping = [
        'a' => 'href',
        'img' => 'src',
        'link' => 'href'
    ];

    $filteredTags = array_filter($tags, function ($tag) use ($mapping) {
        return array_key_exists($tag['name'], $mapping);
    });

    $paths = array_map(function ($tag) use ($mapping) {
        $attributeName = $mapping[$tag['name']];
        return $tag[$attributeName];
    }, $filteredTags);
    return array_values($paths);
}
 */

namespace App\HTML;

function getLinks(array $tags): array
{
    $searchingTags = array_filter($tags, fn($item)=>$item['name'] === 'a' || $item['name'] === 'link' ||
    $item['name'] === 'img');
    return array_reduce($searchingTags, function ($acc, $item) {
        switch ($item) {
            case $item['name'] === 'img':
                $acc[] =  $item['src'];
                break;
            case $item['name'] === 'a' || $item['name'] === 'link':
                $acc[] = $item['href'];
                break;
        }
        return $acc;
    }, []);
}
