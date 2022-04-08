<?php

/*
 * src/strategies/Normal.php
Реализуйте стратегию, которая пытается заполнить поля, пробегаясь построчно снизу вверх и слева направо.
 Как только она встречает свободное поле, то вставляет туда значение.
public function getNextStep($map)
    {
        for ($i = 3; $i >= 1; $i--) {
            foreach ($map[$i] as $j => $value) {
                if ($value === null) {
                    return [$i, $j];
                }
            }
        }
    }
 */

namespace App;

class Normal
{
    // BEGIN (write your solution here)
    private array $field;

    public function __construct($field)
    {
        $this->field = array_reverse($field);
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
