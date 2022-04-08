<?php

/*
 * class HTMLElement
{
    private $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    protected function stringifyAttributes()
    {
        // BEGIN
        $line = collect($this->attributes)
            ->map(fn($item, $key) => " {$key}=\"{$item}\"")
            ->join('');

        return $line;
        // END
    }
}
 */
namespace App;

class HTMLElement
{
    private $attributes = [];

    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    protected function stringifyAttributes()
    {
        // BEGIN (write your solution here)
        $result = [];
        foreach ($this->attributes as $key => $value) {
            $result[] = " {$key}=" . '"' . "{$value}" . '"';
        }
        return implode($result);
        // END
    }
}
