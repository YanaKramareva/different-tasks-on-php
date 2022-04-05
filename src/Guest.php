<?php

namespace App;

/*
 * namespace App;

class Guest
{
    public function getName()
    {
        return 'Guest';
    }

    // BEGIN
    public function getTypeName()
    {
        return 'guest';
    }
    // END
}

 */
class Guest
{
    public function getName()
    {
        return 'Guest';
    }

    // BEGIN (write your solution here)
    public function getGreetings()
    {
        return "Nice to meet you Guest!";
    }
}
