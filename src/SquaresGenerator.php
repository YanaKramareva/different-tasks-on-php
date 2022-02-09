<?php

namespace App;

use App\Square;

/* src/SquaresGenerator.php
Реализуйте класс SquaresGenerator со статическим методом generate,
принимающим два параметра: сторону и количество экземпляров квадрата (по умолчанию 5 штук),
которые нужно создать. Функция должна вернуть массив из квадратов.

<?php

$squares = SquaresGenerator::generate(3, 2);
// [new Square(3), new Square(3)];

 */

class SquaresGenerator
{
    public static function generate($side, $number = 5)
    {
        $result = [];
        for ($i = 1; $i <= $number; $i++) {
            $result[] = new Square($side);
        }
        return $result;
    }
}
