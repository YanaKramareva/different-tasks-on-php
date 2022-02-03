<?php

namespace App;
/*
 * Реализуйте метод __toString(), который преобразует отрезок к строке в соответствии с примером ниже [(1, 10)]

<?php

$point1 = new Point(1, 10);
$point2 = new Point(11, -3);
$segment1 = new Segment($point1, $point2);
echo $segment1; // [(1, 10), (11, -3)]

$segment2 = new Segment($point2, $point1);
echo $segment2; // [(11, -3), (1, 10)]

 */
class Segment
{
    // BEGIN (write your solution here)
    private $beginPoint;
    private $endPoint;

    // END

    public function __construct($beginPoint, $endPoint)
    {
        $this->beginPoint = $beginPoint;
        $this->endPoint = $endPoint;
    }

    // BEGIN (write your solution here)
    public function getBeginPoint()
    {
        return $this->beginPoint;
    }

    public function getEndPoint()
    {
        return $this->endPoint;
    }

    public function __toString()
    {
        return "[{$this->beginPoint}, {$this->endPoint}]";
    }
}