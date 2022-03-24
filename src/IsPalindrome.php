<?php

namespace App\IsPalindrome;

use function App\ReverseString\reverseString;

/*
 * Реализуйте функцию isPalindrome(), которая принимает на вход слово,
 * определяет является ли оно палиндромом и возвращает логическое значение.

В отличие от предыдущей реализации,
выполните эту более простым способом, через сравнение исходной строки с ее перевернутой версией.
Если они между собой равны, значит это палиндром.
Для переворота строки воспользуйтесь функцией reverse(), которая находится в файле src/Strings.php.
 */


function isPalindrome(string $string): bool
{
    $reversedString = reverseString($string);
    return $reversedString === $string;
}
