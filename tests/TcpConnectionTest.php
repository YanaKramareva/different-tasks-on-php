<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class TcpConnectionTest extends TestCase
{
    public function testTcpConnection()
    {
        $connection = new \App\TcpConnection('33.22.11.22', 20);
        $connection->connect();
        $this->assertEquals('connected', $connection->getCurrentState());
        $connection->write('one');
        $connection->write('two');
        $connection->disconnect();
        $this->assertEquals('disconnected', $connection->getCurrentState());
    }

    public function testTcpConnectionTryConnectWhenAlreadyConnected()
    {
        $this->expectException(\Exception::class);
        $connection = new \App\TcpConnection('33.22.11.22', 20);
        $connection->connect();
        $connection->connect();
    }

    public function testTcpConnectionTryDisconnectWhenAlreadyDisconnected()
    {
        $this->expectException(\Exception::class);
        $connection = new \App\TcpConnection('33.22.11.22', 20);
        $connection->connect();
        $connection->disconnect();
        $connection->disconnect();
    }

    public function testTcpConnectionTrySendDataWhenAlreadyDisconnected()
    {
        $this->expectException(\Exception::class);
        $connection = new \App\TcpConnection('34.22.11.22', 20);
        $connection->connect();
        $connection->disconnect();
        $connection->write('one');
    }
}
