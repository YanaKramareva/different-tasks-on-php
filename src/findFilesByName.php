<?php
/*

Реализуйте функцию findFilesByName(), которая принимает на вход файловое дерево и подстроку, а возвращает список файлов, имена которых содержат эту подстроку.

Примеры
<?php

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function App\findFilesByName\findFilesByName;

$tree = mkdir('/', [
    mkdir('etc', [
        mkdir('apache'),
        mkdir('nginx', [
            mkfile('nginx.conf', ['size' => 800]),
        ]),
        mkdir('consul', [
            mkfile('config.json', ['size' => 1200]),
            mkfile('data', ['size' => 8200]),
            mkfile('raft', ['size' => 80]),
        ]),
    ]),
    mkfile('hosts', ['size' => 3500]),
    mkfile('resolve', ['size' => 1000]),
]);

findFilesByName($tree, 'co');
// ['/etc/nginx/nginx.conf', '/etc/consul/config.json']
Примечания
Обратите внимание на то, что возвращается не просто имя файла, а полный путь до файла, начиная от корня.
 */
namespace App\findFilesByName;

use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getChildren;
use function Php\Immutable\Fs\Trees\trees\array_flatten;

// BEGIN (write your solution here)
function iter($node, $string, $path = '')
{
    if ($node === null){
        return;
    }
    $name = getName($node);
    if (isFile($node)) {
        if (strchr($name, $string)) {
            return  [$path];
        }
        return;
    }
    $children = getChildren($node);
    if (count($children) === 0) {
        return;
    }

    $result =  array_reduce($children, function ($acc, $child) use ($path, $string) {
        $acc[] =  iter($child, $string, $path . '/' .getName($child));
        return array_filter($acc, fn($item)=> !is_null($item));
    }, []);
    return array_flatten($result);
}

function findFilesByName($tree, $string)
{
    return iter($tree, $string);
}
// END
