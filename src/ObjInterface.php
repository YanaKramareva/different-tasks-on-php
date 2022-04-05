<?php

namespace App;

interface ObjInterface
{
    public function __get($key);

    public function __set($key, $value);
}
