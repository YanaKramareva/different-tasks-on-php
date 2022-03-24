<?php

/*
 * Это испытание требует знакомства с двоичной системой счисления.

Solution.php
Реализуйте функцию binarySum, которая принимает на вход два бинарных числа (в виде строк) и возвращает
 их сумму. Результат (вычисленная сумма) также должен быть бинарным числом в виде строки.

Посмотрите примеры работы функции:

<?php

binarySum('10', '1'); // 11
binarySum('1101', '101'); // 10010
Подсказки
bindec
decbin

 */

namespace App\Solution;

function binarySum($first, $second)
{
    $result = bindec($first) + bindec($second);
    return decbin($result);
}
