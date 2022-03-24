<?php

/*
 * Реализуйте функцию isBalanced(), которая принимает на вход строку, состоящую только из открывающих и закрывающих круглых скобок, и проверяет, является ли эта строка корректной. Пустая строка (отсутствие скобок) считается корректной.

Строка считается корректной (сбалансированной), если содержащаяся в ней скобочная структура соответствует требованиям:

Скобки — это парные структуры. У каждой открывающей скобки должна быть соответствующая ей закрывающая скобка.
Закрывающая скобка не должна идти впереди открывающей. Такой вариант недопустим )(, а вот такой допустим ()().
<?php

isBalanced('(())');  // true
isBalanced('((())'); // false

function isBalanced($str)
{
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        $count = $str[$i] === '(' ? $count + 1 : $count - 1;
        if ($count < 0) {
            return false;
        }
    }

    return $count === 0;
}
 */

namespace App\Brackets;

function isBalanced(string $brackets): bool
{
    if ($brackets === '') {
        return true;
    }
    $arrayOfBrackets = str_split($brackets);
    if (count($arrayOfBrackets) % 2 !== 0) {
        return false;
    }
    $open = count(array_filter($arrayOfBrackets, fn($item) => $item === '('));
    $close = count(array_filter($arrayOfBrackets, fn($item) => $item === ')'));
    if ($open !== $close) {
        return false;
    }

    $bracketsStack = array_reduce($arrayOfBrackets, function ($stack, $item) {
        switch ($item) {
            case '(':
                array_push($stack, $item);
                break;
            case ')':
                array_pop($stack) === null ??
                array_push($stack, $item);
        }
        return $stack;
    }, []);
    return $bracketsStack === [];
}
