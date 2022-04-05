<?php

/*
 * Реализуйте функцию scrabble, которая принимает на вход два параметра: набор символов (строку) и слово,
 * и проверяет, можно ли из переданного набора составить это слово. В результате вызова функция возвращает true или false.

При проверке учитывается количество символов, нужных для составления слова, и не учитывается их регистр.

Примеры
<?php

use function App\Solution\scrabble;

scrabble('rkqodlw', 'world'); // true
scrabble('avj', 'java'); // false
scrabble('avjafff', 'java'); // true
scrabble('', 'hexlet'); // false
scrabble('scriptingjava', 'JavaScript'); // true

function countByChars($str)
{
    $symbols = str_split($str);
    return array_count_values($symbols);
}

function scrabble($str, $word)
{
    $charsStr = countByChars($str);
    $charsWord = countByChars(mb_strtolower($word));
    foreach ($charsWord as $char => $count) {
        if (!array_key_exists($char, $charsStr)) {
            return false;
        }
        if ($charsStr[$char] < $count) {
            return false;
        }
    }
    return true;
}
 */

namespace App\Solution;

function scrabble(string $string, string $word)
{
    $search = str_split(strtolower($word));
    $haystack = strtolower($string);
    $result = array_reduce($search, function ($acc, $item) use (&$haystack) {
        if (strpos($haystack, $item) !== false) {
            $acc[] = $item;
            $newHaystack = substr_replace($haystack, '', strpos($haystack, $item), 1);
            $haystack = $newHaystack;
        }
        return $acc;
    }, []);
    return $result === $search;
}
