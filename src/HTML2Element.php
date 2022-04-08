<?php

/*
 * Реализуйте набор методов для работы с классами:

addClass($className) – добавляет класс
removeClass($className) – удаляет класс
toggleClass($className) – ставит класс если его не было и убирает если он был
Эти методы должны обрабатывать свойство 'class' (внутри строка) массива $this->attributes.
 В процессе реализации вам понадобится постоянно преобразовывать строку классов в массив и обратно.
Вынесите эту операцию в отдельные функции и установите им правильный модификатор доступа.

<?php

$div = new HTMLDivElement(['class' => 'one two']);
$div->getAttribute('class'); // 'one two'

$div->addClass('small');
$div->getAttribute('class'); // 'one two small'

$div->addClass('small');
$div->getAttribute('class'); // 'one two small'

$div->removeClass('two');
$div->getAttribute('class'); // 'one small'

$div->toggleClass('small');
$div->getAttribute('class'); // 'one'

$div->toggleClass('small');
$div->getAttribute('class'); // 'one small'

class HTMLElement
{
    private $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    // BEGIN
    public function addClass($className)
    {
        $classes = $this->getClasses();
        $newClasses = array_unique(array_merge($classes, [$className]));
        $this->attributes['class'] = $this->stringifyClasses($newClasses);
    }

    public function removeClass($className)
    {
        $classes = $this->getClasses();
        $newClasses = array_diff($classes, [$className]);
        $this->attributes['class'] = $this->stringifyClasses($newClasses);
    }

    public function toggleClass($className)
    {
        if (in_array($className, $this->getClasses())) {
            $this->removeClass($className);
            return;
        }

        $this->addClass($className);
    }

    private function getClasses()
    {
        return explode(' ', $this->getAttribute('class') ?? '');
    }

    private function stringifyClasses($classes)
    {
        return implode(' ', $classes);
    }
    // END
}
 */

namespace App;

class HTML2Element
{
    private $attributes = [];
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttribute($key)
    {
        return $this->attributes[$key];
    }

    // BEGIN (write your solution here)
    protected function classToArray()
    {
        return explode(' ', $this->attributes['class']);
    }
    protected function arrayToClass($array)
    {
        $this->attributes['class'] =  implode(' ', $array);
    }
    public function addClass($className) //добавляет класс
    {
        $array = $this->classToArray();
        if (!in_array($className, $array)) {
            $array[] = $className;
        }
        return $this->arrayToClass($array);
    }
    public function removeClass($className) // удаляет класс
    {
        $array = $this->classToArray();
        $result = array_filter($array, fn($item)=>$item !== $className);
        return $this->arrayToClass($result);
    }

    public function toggleClass($className) // ставит класс если его не было и убирает если он был
    {
        $array = $this->classToArray();
        return in_array($className, $array) ? $this->removeClass($className) : $this->addClass($className);
    }
    // END
}
