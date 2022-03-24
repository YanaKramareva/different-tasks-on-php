<?php

/*
 * Реализуйте функцию getLongestLength() принимающую на вход строку и возвращающую длину
 *  максимальной последовательности из неповторяющихся символов. Подстрока может состоять из
 *  одного символа. Например в строке qweqrty, можно выделить следующие подстроки: qwe, weqrty.
 * Самой длинной будет weqrty.

Примеры
<?php

getLongestLength('abcdeef'); // 5
getLongestLength('jabjcdel'); // 7
getLongestLength(''); // 0

function getLongestLength(string $str)
{
    $sequence = [];
    $maxLength = 0;

    // Проходимся по всем символам переданной строки.
    for ($i = 0; $i < strlen($str); $i += 1) {
        $char = $str[$i];
        // Ищем в сформированной последовательности
        // позицию первого вхождения текущего символа.
        $index = array_search($char, $sequence);
        // Добавляем в последовательность текущий символ.
        $sequence[] = $char;
        if ($index !== false) {
            // Если символ в последовательности был найден,
            // значит в неё был добавлен повторяющийся символ.
            // Отсекаем все символы, включая найденный.
            $sequence = array_slice($sequence, $index + 1);
        }
        // Получаем длину последовательности.
        $sequenceLength = count($sequence);
        if ($sequenceLength > $maxLength) {
            // Если длина последовательности больше чем максимальная,
            // устанавливаем новую максимальную длину.
            $maxLength = $sequenceLength;
        }
    }

    return $maxLength;
}
 */

namespace App\Solution;

function getLongestLength($string)
{
    $strlen = strlen($string);
    $maxLength = 0;
    for ($a = 0; $a < $strlen; $a++) {
        for ($b = $a; $b < $strlen; $b++) {
            $str = substr($string, $a, $b - $a + 1);
            if (strpos($str, $string[$b]) === ($b - $a)) {
                $maxLength = ($maxLength > strlen($str)) ? $maxLength : strlen($str);
            } else {
                break;
            }
        }
    }
    return $maxLength;
}
