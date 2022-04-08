<?php

namespace App;

interface TcpConnectionInterface
{
    public function __construct($ip, $port);
    public function getCurrentState();
    public function connect();
    public function disconnect();
    public function write($data);
}
