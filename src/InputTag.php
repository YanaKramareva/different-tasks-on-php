<?php

namespace App;

class InputTag implements Tag
{
    private $type;
    private $value;

    public function __construct(string $type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }

    public function render()
    {
        return "<input type=\"{$this->type}\" value=\"{$this->value}\">";
    }

    public function __toString()
    {
        return $this->render();
    }
}
