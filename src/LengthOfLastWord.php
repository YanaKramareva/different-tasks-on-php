<?php

/*
 * Реализуйте функцию lengthOfLastWord, которая возвращает длину последнего слова переданной на вход строки.
 * Словом считается любая последовательность, не содержащая пробелов.

<?php

lengthOfLastWord(''); // 0

lengthOfLastWord('man in BlacK'); // 5

lengthOfLastWord('hello, world!  '); // 6

function lengthOfLastWord(string $str)
{
    $words = explode(' ', trim($str));
    return strlen($words[count($words) - 1]);
}
 */

namespace App\LengthOfLastWord;

function lengthOfLastWord(string $string): int
{
    $arrayFromString = explode(' ', trim($string));
    $seachingWord = $arrayFromString[array_key_last($arrayFromString)];
    return strlen($seachingWord);
}
