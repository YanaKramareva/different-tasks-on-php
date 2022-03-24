<?php

/*
 * Реализуйте функцию fizzBuzz(), которая выводит на экран числа в диапазоне от $begin до $end.
 *  При этом:

Если число делится без остатка на 3, то вместо него выводится слово Fizz
Если число делится без остатка на 5, то вместо него выводится слово Buzz
Если число делится без остатка и на 3, и на 5, то вместо числа выводится слово FizzBuzz
В остальных случаях выводится само число
Функция принимает два параметра ($begin и $end), определяющих начало и конец диапазона (включительно).
Если диапазон пуст (в случае, когда $begin > $end), то функция просто ничего не печатает.

Пример
Вызов функции:

<?php

fizzBuzz(11, 20);
Вывод в терминале:

11 Fizz 13 14 FizzBuzz 16 17 Fizz 19 Buzz
Это задание крайне часто задают на собеседованиях.

function fizzBuzz($begin, $end)
{
    for ($i = $begin; $i <= $end; $i++) {
        $hasFizz = $i % 3 === 0;
        $hasBuzz = $i % 5 === 0;
        $fizzPart = $hasFizz ? 'Fizz' : '';
        $buzzPart = $hasBuzz ? 'Buzz' : '';
        print_r($hasFizz || $hasBuzz ? "{$fizzPart}{$buzzPart}" : $i);
        print_r(" ");
    }
}
 */

namespace App\Solution;

function fizzBuzz($begin, $end)
{
    for ($i = $begin; $i <= $end; $i++) {
        switch ($i) {
            case ($i % 3 === 0 && $i % 5 === 0):
                echo 'FizzBuzz ';
                break;
            case $i % 3 === 0:
                echo 'Fizz ';
                break;
            case $i % 5 === 0:
                echo 'Buzz ';
                break;
            default:
                echo "{$i} ";
        }
    }
}
