<?php

namespace App;

/*
 * Реализуйте генератор рандомных чисел, представленный классом Random.
 * Интерфейс объекта включает в себя три функции:

Конструктор. Принимает на вход seed, начальное число генератора псевдослучайных чисел
getNext — метод, возвращающий новое случайное число
reset — метод, сбрасывающий генератор на начальное значение
<?php

$seq = new Random(100);
$result1 = $seq->getNext();
$result2 = $seq->getNext();

$result1 != $result2; // true

$seq->reset();

$result21 = $seq->getNext();
$result22 = $seq->getNext();

$result1 === $result21; // true
$result2 === $result22; // true
Простейший способ реализовать случайные числа — линейный конгруэнтный метод.
 */
class Random
{
    const RAND_MAX = 32767;
    const RAND = 1103515245;
    const RAND2 = 12345;
    const  RAND3 = 65536;
    private $seed;
    public $next;

    public function __consrtuct($seed)
    {
        $this->seed = $seed;
    }

    public function getSeed()
    {var_dump($this->seed);
        return $this->seed;
    }

    public function getNext()
    {
        $this->next = $this->getSeed() * self::RAND_MAX + self::RAND2;
        return ($this->next / self::RAND3) % (self::RAND_MAX + 1);
    }

    public function reset()
    {
        return $this->seed;
    }
}
