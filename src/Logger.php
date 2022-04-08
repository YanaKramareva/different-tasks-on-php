<?php

namespace App;

class Logger implements LoggerInterface
{
    public function info($message)
    {
        echo $message;
    }
}
