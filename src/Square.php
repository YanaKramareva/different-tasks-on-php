<?php

namespace App;

/*
 * Реализуйте класс Square для описания квадратов. У квадрата есть только одно свойство — сторона.
 *  Реализуйте метод getSide, возвращающий значение стороны.

<?php

$square = new Square(10);
$square->getSide(); // 10
 */
class Square
{
    private $side;

    public function __construct($side)
    {
        $this->side = $side;
    }

    public function getSide()
    {
        return $this->side;
    }
}
