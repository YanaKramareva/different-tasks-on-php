<?php

/*
 * В программировании часто встречается задача очистки текста от мусора или потенциально опасных частей,
 * например HTML тегов. В PHP для такой очистки подходят функции trim (отрезает концевые пробелы),
 * strip_tags (удаляет теги) и другие.

Представьте себе объектно-ориентированный интерфейс для очистки текста:

<?php

$sanitizer = new Sanitizer();
$sanitizer->sanitize('text   '); // 'text'
$sanitizer->sanitize(' boom '); // 'boom'
Этот санитайзер очень простой. Единственное, что он умеет – удалять концевые пробелы.
 Представьте, что появилась задача добавить в этот процесс очистку текста от тегов.
Эту задачу можно решить несколькими путями:

Через прямое изменение класса санитайзера.
Такой способ иногда может сработать, но он не сработает,
если это чужая библиотека или она используется где-то, где нужно удалять только концевые пробелы.
Через наследование. Тут все понятно, создаем класс наследник в котором переопределяем метод sanitize.
 В этом методе делаем strip_tags($text) и передаем результат дальше в родительскую функцию. Результат возвращаем наружу.
Через композицию.
В этом задании нужно реализовать последний вариант.
Он сводится к использованию полиморфизма через объект-обертку.
Такой подход называется "шаблон проектирования декоратор".

<?php

$baseSanitizer = new Sanitizer();
$sanitizer = new SanitizerStripTagsDecorator($baseSanitizer);
$sanitizer->sanitize('text   '); // 'text'
$sanitizer->sanitize(' boom '); // 'boom'
src\Sanitizer.php
Создайте класс Sanitizer и реализуйте интерфейс SanitizerInterface.
Метод sanitize($text) должен отрезать концевые пробелы и возвращать результат наружу.

src\SanitizerStripTagsDecorator.php
Создайте класс (декоратор) SanitizerStripTagsDecorator, который также реализует интерфейс SanitizerInterface.
Он принимает в конструктор исходный санитайзер и дополнительно к его логике, выполняет очистку текста от тегов.
 Очистка текста от тегов должна идти раньше чем отрезание концевых пробелов.

Подсказки
strip_tags
trim
 */


namespace App;

class SanitizerStripTagsDecorator
{
    private object $sanitizer;

    public function __construct(object $sanitizer)
    {
        $this->sanitizer = $sanitizer;
    }

    public function sanitize($text)
    {
        $sanitizedText = strip_tags($text);
        return $this->sanitizer->sanitize($sanitizedText);
    }
}
