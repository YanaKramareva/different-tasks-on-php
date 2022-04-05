<?php

namespace App;

/*
 * class User
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    // BEGIN
    public function getTypeName()
    {
        return 'user';
    }
    // END
}
 */

class SiteUser
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    // BEGIN (write your solution here)
    public function getGreetings()
    {
        return "Hello {$this->name}!";
    }
    // END
}
