<?php

namespace App;

/*
 * Реализуйте недостающие части класса Timer, который описывает собой таймер обратного отсчета.
 * Необходимо дописать конструктор принимающий на вход три параметра:
 *  секунды, минуты (необязательный) и часы (необязательный).
 *  Конструктор должен подсчитать общее количество секунд для переданного времени
 * и записать его в свойство secondsCount.

Воспользуйтесь константой SEC_PER_MIN для перевода минут в секунды (через умножение)
Реализуйте дополнительную константу SEC_PER_HOUR и воспользуйтесь ей для перевода часов в секунды
Примеры:
<?php

$timer1 = new Timer(10);
$timer1->getLeftSeconds(); // 10
$timer1->tick();
$timer1->getLeftSeconds(); // 9

$timer2 = new Timer(8, 20, 8);
$timer2->getLeftSeconds(); // 30008

 */
class Timer
{
    public const SEC_PER_MIN = 60;
    // BEGIN (write your solution here)
    public const SEC_PER_HOUR = 3600;
    private $secondsCount;

    public function  __construct($seconds, $minutes = 0, $hours = 0)
    {
        $this->secondsCount = $seconds + $minutes * self::SEC_PER_MIN + $hours * self::SEC_PER_HOUR;

    }
    // END

    public function getLeftSeconds()
    {
        return $this->secondsCount;
    }

    public function tick()
    {
        $this->secondsCount--;
    }
}