<?php

namespace App;

interface Tag
{
    public function render();
    public function __toString();
}
