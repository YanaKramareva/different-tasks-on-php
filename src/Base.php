<?php

namespace App;

/*
 * Реализуйте метод isInstanceOf($className), который проверяет что объект принадлежит одному из классов в цепочке наследования.

<?php

// ChildOfChild extends FirstChild extends Base

$obj = new \App\ChildOfChild();
$obj->isInstanceOf('App\Base'); // true
$obj->isInstanceOf('Base'); // false
$obj->isInstanceOf('App\Base'); // true
$obj->isInstanceOf('App\FirstChild'); // true
$obj->isInstanceOf('SomeClass'); // false
Подсказки
get_class – возвращает название класса текущего объекта
class_parents – возвращает список всех классов родителей

public function isInstanceOf($className)
    {
        $classes = class_parents($this);
        $currentClass = get_class($this);
        $classes[$currentClass] = $currentClass;
        return in_array($className, $classes);
    }
 */
class Base
{
    // BEGIN (write your solution here)
    public function isInstanceOf($className)
    {
        if ($className === get_class($this)) {
            return true;
        }
        $arrayOfClasses = class_parents($this);
        return in_array($className, $arrayOfClasses);
    }
    // END
}
