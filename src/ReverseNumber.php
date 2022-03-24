<?php

/*
 * Реализуйте функцию reverse(), которая переворачивает цифры в переданном числе:

<?php

use function App\Number\reverse;

reverse(13); // 31
reverse(-123); // -321
Не забудьте задать тип входного и выходного аргумента.

Подсказки
Переворот строки
Одно из решений этой задачи опирается на явное преобразование типов

 */

namespace App\Number;

// BEGIN (write your solution here)
function reverseNumber($number)
{
    if ($number > 0) {
        return (int) strrev($number);
    } elseif ($number === 0) {
        return $number;
    } else {
        $string = strrev(substr($number, 1));
        $result = "-" . $string;
        return (int)  $result;
    }
}
// END
