<?php
/*
 * В этом испытании вам предстоит написать собственную реализацию этих функций, только работать они будут с файловыми деревьями.

map() принимает на вход функцию-обработчик и дерево, а возвращает отображенное дерево.

filter() принимает в качестве параметров предикат и дерево, а возвращает отфильтрованное дерево по предикату.

reduce() кроме основных параметров (функция-обработчик и дерево) принимает также начальное значение аккумулятора.

<?php

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function App\solution\map;
use function App\solution\filter;
use function App\solution\reduce;


$tree = mkdir('/', [
    mkdir('eTc', [
        mkfile('config.json')
    ]),
]);
Приводим имена всех директорий и файлов к верхнему регистру:

map(fn($node) => array_merge($node, ['name' => strtoupper(getName($node))]), $tree);
// [
//   'name' => '/',
//   'type' => 'directory',
//   'meta' => [],
//   'children' => [
//     [
//       'name' => 'ETC',
//       'type' => 'directory',
//       'meta' => [],
//       'children' => [['name' => 'CONFIG.JSON', 'type' => 'file', 'meta' => []]],
//     ],
//   ],
// ]
Отфильтровываем директории:

filter(fn($node) => isDirectory($node), $tree);
// [
//   'name' => '/',
//   'type' => 'directory',
//   'meta' => [],
//   'children' => [
//     [
//       'name' => 'eTc',
//       'type' => 'directory',
//       'meta' => [],
//       'children' => [],
//     ],
//   ],
// ]
Подсчитываем количество узлов в дереве:

reduce(fn($acc) => $acc + 1, $tree, 0);
// 3
Решение:
function map(callable $func, array $tree)
{
    $map = function ($node) use (&$map, $func) {
        $newNode = $func($node);
        if (isDirectory($node)) {
            return mkdir(getName($newNode), array_map($map, getChildren($node)));
        }
        return $newNode;
    };
    return $map($tree);
}

function filter($func, $tree)
{
    $filter = function ($node) use (&$filter, $func) {
        if (!$func($node)) {
            return null;
        }

        if (isDirectory($node)) {
            $updatedChildren = array_map(fn($child) => $filter($child), getChildren($node));
            $filteredChildren = array_filter($updatedChildren, fn($child) => $child !== null);

            return mkdir(getName($node), array_values($filteredChildren));
        }

        return $node;
    };

    return $filter($tree);
}

function reduce($func, $tree, $accumulator)
{
    $reduce = function ($node, $acc) use (&$reduce, $func) {
        $newAcc = $func($acc, $node);

        if (isDirectory($node)) {
            $children = getChildren($node);
            return array_reduce($children, fn($iAcc, $child) => $reduce($child, $iAcc), $newAcc);
        }

        return $newAcc;
    };

    return $reduce($tree, $accumulator);
}
 */

namespace App\solution;

use function Php\Immutable\Fs\Trees\trees\{
    mkdir,
    getName,
    isDirectory,
    getChildren
};

function map($func, $tree)
{
    $updatedNode = $func($tree);
    $children = $tree['children'] ?? [];

    if (isDirectory($tree)) {
        $updatedChildren = array_map(fn($node) => map($func, $node), $children);
        return array_merge($updatedNode, ['children' => $updatedChildren]);
    }

    return $updatedNode;
}

/**
 * Reduce tree
 * @param callable $func
 * @param array $tree
 * @param mixed $accumulator
 * @return mixed
 */
function reduce($func, $tree, $accumulator)
{
    $children = $tree['children'] ?? [];
    $newAcc = $func($accumulator, $tree);

    if (isFile($tree)) {
        return $newAcc;
    }

    return array_reduce(
        $children,
        fn($acc, $node) => reduce($func, $node, $acc),
        $newAcc
    );
}

/**
 * Filter tree
 * @param callable $func
 * @param array $tree
 * @return array
 */
function filter($func, $tree)
{
    if (!$func($tree)) {
        return null;
    }

    $children = $tree['children'] ?? null;

    if (isDirectory($tree)) {
        $updatedChildren = array_map(fn($node) => filter($func, $node), $children);
        $filteredChildren = array_filter($updatedChildren);
        return array_merge($tree, ['children' => array_values($filteredChildren)]);
    }

    return $tree;
}
