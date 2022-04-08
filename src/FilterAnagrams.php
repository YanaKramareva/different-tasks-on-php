<?php

namespace App\Solution;

/*
 * Анаграммы — это слова, которые образуются путём перестановки букв. Слова-анаграммы состоят из одного
 *  и того же набора букв и имеют одинаковую длину. Например:

спаниель — апельсин
карат — карта — катар
топор — ропот — отпор
src/Solution.php
Реализуйте функцию filterAnagrams(), которая находит все анаграммы слова.
 Функция принимает исходное слово и список для проверки (массив), а возвращает массив всех анаграмм.
Если в списке слов отсутствуют анаграммы, то возвращается пустой массив.

Примеры
<?php

use function App\Solution\filterAnagrams;

filterAnagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']);
// ['aabb', 'bbaa']

filterAnagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']);
// ['carer', 'racer']

filterAnagrams('laser', ['lazing', 'lazy',  'lacer']);
// []

function normalize($str)
{
    $arr = str_split($str);
    sort($arr);
    return $arr;
}

function filterAnagrams($word, $words)
{
    $normal = normalize($word);
    $filtered = array_filter($words, function ($item) use ($normal) {
        return normalize($item) === $normal;
    });
    return array_values($filtered);
}
 */

function filterAnagrams(string $anagram, array $anagramsArray): array
{
    if ($anagramsArray === []) {
        return $anagramsArray;
    }
    $arrayFromAnagram = str_split($anagram);
    sort($arrayFromAnagram);
    $modifiedAnagramArray = array_filter($anagramsArray, function ($item) use (&$arrayFromAnagram) {
        $newItem =  str_split($item);
        sort($newItem);
        return $newItem === $arrayFromAnagram;
    });

    return array_values($modifiedAnagramArray);
}
