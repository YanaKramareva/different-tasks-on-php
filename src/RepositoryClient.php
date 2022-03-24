<?php

namespace App;

class RepositoryClient implements RepositoryClientInterface
{
    public function repos($user)
    {
        throw new \Exception('Can not send http request');
    }
}
