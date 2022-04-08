<?php

/*
 * Один из самых красивых примеров использования трейтов – Enumerable.
 * Он крайне популярен в языках с поддержкой миксинов (а трейты это разновидность миксинов).

<?php

public function maxBy(callable $fn);
public function sortBy(callable $fn);
public function select(callable $fn);
public function map(callable $fn);
// и еще несколько десятков полезных методов

// Трейт требует от класса реализации функции getIterator.
// Это все что ему нужно для реализации своих методов.
abstract public function getIterator(): iterable;
Представьте себе любой класс, который описывает собой коллекцию элементов.
 Как правило этой коллекции требуются разнообразные методы для работы, например сортировка или фильтрация.
До трейтов, эта задача превращалась в бесконечную копипасту кода.
Трейты же, позволяют выделить всю необходимую логику в одно место.

<?php

$lessons = [
    // Второй параметр это продолжительность урока в минутах
    new Lesson('react start', 3),
    new Lesson('react component', 9),
    new Lesson('react lifecycle', 2),
    new Lesson('redux', 4),
];

// use Enumerable;
$course = new Course($lessons);
$lesson = $course->maxBy(function ($l1, $l2) {
    return $l1->getDuration() <=> $l2->getDuration();
});

print_r($lesson); // ('react component', 9)
src/Course.php
Подключите трейт Enumerable

src/Enumerable.php
Реализуйте трейт, добавьте в него метод maxBy, работающий по примеру выше.
Этот метод принимает на вход анонимную функцию, которая выполняет сравнение двух элементов коллекции
 по нужному признаку. Результатом этой функции будет элемент соответствующий критерию максимальности.
Принцип работы такой же как и у usort

Подсказки
Enumerable (Ruby)
<=> (Spaceship)

 */
namespace App;

trait Enumerable
{
    abstract public function getIterator(): iterable;

    // BEGIN
    public function maxBy(callable $fn)
    {
        $items = $this->getIterator();
        if (!count($items)) {
            return null;
        }
        $result = array_reduce($items, function ($acc, $item) use ($fn) {
            $value = $fn($acc, $item);
            return $value >= 0 ? $acc : $item;
        }, $items[0]);
        return $result;
    }
    // END
}
