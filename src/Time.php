<?php

namespace App;

/*
 * Класс Time предназначен для создания объекта-времени.
 * Его конструктор принимает на вход количество часов и минут в виде двух отдельных параметров.

<?php

$time = new Time(10, 15);
echo $time; // => 10:15
src/Time.php
Добавьте в класс Time статический метод fromString, который позволяет создавать инстансы
 Time на основе времени переданного строкой формата часы:минуты.

<?php

$time = Time::fromString('10:23');
$this->assertEquals('10:23', $time); // автоматически вызывается __toString

class Time
{
    private $h;
    private $m;

    // BEGIN
    public static function fromString($time)
    {
        [$h, $m] = explode(':', $time);
        return new self($h, $m);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}
 */
class Time
{
    private $h;
    private $m;

    // BEGIN (write your solution here)
    public static function fromString($time)
    {
        $array = explode(':', $time);
        $hours = $array[0];
        $minutes = $array[1];
        return new self($hours, $minutes);
    }
    // END

    public function __construct($h, $m)
    {
        $this->h = $h;
        $this->m = $m;
    }

    public function __toString()
    {
        return "{$this->h}:{$this->m}";
    }
}
