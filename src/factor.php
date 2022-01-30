<?php
/*
 * Реализуйте функцию factor(), которая принимает на вход число (множитель) и возвращает функцию. Получившаяся функция принимает на вход один аргумент и возвращает результат умножения этого аргумента на множитель.

Примеры
<?php

$multiTwo = factor(2); // 2 - множитель

$multiTwo(2); // 4
$multiTwo(10); // 20
src/Double.php
Реализуйте функцию double(), которая принимает как аргумент функцию с одним аргументом и возвращает функцию, которая применяет исходную функцию дважды.

Примеры
Исходная функция с одним аргументом:

<?php

$increment(1); // 2
double() вернул новую функцию, которая применяет inc() дважды:

<?php

$increment2 = double($increment);
$increment2(1); // 3
Тут мы применяем double() дважды и в итоге increment() выполняется 4 раза:

<?php

$increment4 = double(double($increment));
$increment4(1); // 5

 */

namespace App\Factor;

function factor($multiplier)
{
    return function ($num) use($multiplier) {
      return $num * $multiplier;
    };
}
