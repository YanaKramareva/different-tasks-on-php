<?php

/*
 * Счастливым" называют билет с номером, в котором сумма первой половины цифр равна сумме
 *  второй половины цифр. Номера могут быть произвольной длины, с единственным условием,
 * что количество цифр всегда чётно, например: 33 или 2341 и так далее.

Билет с номером 385916 — счастливый, так как 3 + 8 + 5 = 9 + 1 + 6. Билет с номером 231002
 не является счастливым, так как 2 + 3 + 1 != 0 + 0 + 2.

src/Ticket.php
Реализуйте функцию isHappy, проверяющую является ли номер счастливым (номер — всегда строка).
 Функция должна возвращать true, если билет счастливый, или false, если нет.

Примеры использования:
<?php

use function Ticket\isHappy;

isHappy('385916'); // true
isHappy('231002'); // false
isHappy('1222'); // false
isHappy('054702'); // true
isHappy('00'); // true

function isHappy($str)
{
    $balance = 0;
    for ($i = 0, $j = strlen($str) - 1; $i < $j; $i += 1, $j -= 1) {
        $balance += $str[$i] - $str[$j];
    }
    return $balance === 0;
}

 */

namespace App\Ticket;

function isHappy($str)
{
    $stringToArray = str_split($str);
    $count = count($stringToArray);
    if ($count % 2 !== 0) {
        return false;
    }
    $firstPart = array_sum(array_slice($stringToArray, 0, $count / 2));
    $secondPart = array_sum(array_slice($stringToArray, $count / 2));
    return $firstPart === $secondPart;
}
