<?php

/*
 * Реализуйте механизм валидации для каждого элемента DOM, который проверяет переданные атрибуты на допустимость.

<?php

$img1 = new HTMLImgElement(['class' => 'rounded', 'src' => 'path/to/image']);
$img1->isValid(); // true

$img2 = new HTMLImgElement(['class' => 'rounded', 'href' => 'path/to/image']);
$img2->isValid(); // false

$button1 = new HTMLButtonElement(['class' => 'rounded', 'type' => 'button']);
$button1->isValid(); // true

$button2 = new HTMLButtonElement(['class' => 'rounded']);
$button2->isValid(); // false
src/HTMLElement.php
Определите абстрактный метод isValid()

src/HTMLImgElement.php
Реализуйте метод isValid, который проверяет соответствие между переданными атрибутами и допустимыми атрибутами.
Для тега Img допустимыми являются: name, class, src. Причём name и class допустимы для любого элемента.
Поэтому информация о них должна находиться в базовом классе.

src/HTMLButtonElement.php
Реализуйте валидацию по аналогии как для тега Img. Для тега Button допустимыми являются: name, class, type.
Причём атрибут type, является обязательным и может принимать одно из доступных значений: button, submit, reset.
abstract class HTMLElement
{
    private const ATTRIBUTE_NAMES = ['name', 'class'];

    public $attributes = [];

    public static function getAttributeNames()
    {
        return self::ATTRIBUTE_NAMES;
    }

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    // BEGIN
    abstract public function isValid();
    // END
}
Подсказки
array_diff
 */
namespace App;

abstract class HTML3Element
{
    private const ATTRIBUTE_NAMES = ['name', 'class'];

    public $attributes = [];

    public static function getAttributeNames()
    {
        return self::ATTRIBUTE_NAMES;
    }

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function isValid(): bool
    {
        $diff = array_diff(array_keys($this->getAttributes()), self::getAttributeNames());
        foreach ($diff as $item) {
            if (!in_array($item, $this->getAttributeNames())) {
                return false;
            }
        }
        return true;
    }
}
