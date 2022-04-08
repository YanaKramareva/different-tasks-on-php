<?php

/*
 * src/strategies/Easy.php
Реализуйте стратегию, которая пытается заполнить поля, пробегаясь построчно слева направо и сверху вниз.
Как только она встречает свободное поле, то вставляет туда значение.
public function getNextStep($map)
    {
        foreach ($map as $i => $row) {
            foreach ($row as $j => $value) {
                if ($value === null) {
                    return [$i, $j];
                }
            }
        }
    }
 */
namespace App;

class Easy
{
    // BEGIN (write your solution here)
    private array $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function calculate()
    {
        foreach ($this->field as $item) {
            foreach ($item as $key => $value) {
                if ($value === '') {
                    return ['line' => key($item), 'column' => $key];
                }
            }
        }
    }
}
