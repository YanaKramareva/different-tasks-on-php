<?php

namespace App;

// Very inefficient implementation
class FileKV
{
    private $dbfilepath;

    public function __construct($dbfilepath, $initial = [])
    {
        $this->dbfilepath = $dbfilepath;

        array_map(fn($key, $value) => $this->set($key, $value), array_keys($initial), $initial);
    }

    public function set($key, $value)
    {
        $content = file_get_contents($this->dbfilepath);
        $data = unserialize($content);
        $data[$key] = $value;
        file_put_contents($this->dbfilepath, serialize($data));
    }

    public function unset($key)
    {
        $content = file_get_contents($this->dbfilepath);
        $data = unserialize($content);
        unset($data[$key]);
        file_put_contents($this->dbfilepath, serialize($data));
    }

    public function get($key, $default = null)
    {
        $content = file_get_contents($this->dbfilepath);
        $data = unserialize($content);
        return $data[$key] ?? $default;
    }

    public function toArray()
    {
        $content = file_get_contents($this->dbfilepath);
        $data = unserialize($content);
        return $data;
    }
}
