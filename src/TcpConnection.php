<?php

namespace App;

/*
 * HTTP – протокол без состояния, то есть после запроса получается ответ и на этом все заканчивается.
 *  Не все протоколы так работают. Например, TCP устроен значительно сложнее.
 * Сначала происходит соединение, затем обмен данными. В конце выполняется разрыв соединения.
 * Примерно так же работают вебсокеты.
 * Для имитации процесса соединения-разъединения поведения в ООП, создают объект, хранящий внутри себя состояние.

В этом задании TcpConnection не настоящий.
Он эмулирует то поведение, которого достаточно для отработки паттерна Состояние,
все остальное убрано чтобы не отвлекать от идей ООП.

Объект соединения ведет себя по-разному, в зависимости от того установлено соединение или нет.
 Например, если попробовать отправить данные когда соединения нет,
то он возбуждает исключение. То же самое касается попытки установить
соединение в той ситуации когда оно уже установлено.

Примеры
<?php

$connection = new TcpConnection('132.223.243.88', 2342);
$connection->connect()
$connection->getCurrentState(); // connected
$connection->write('data');
$connection->disconnect();
$connection->getCurrentState(); // disconnected
$connection->disconnect(); // Boom!
src/TcpConnection.php
Реализуйте класс TcpConnection оглядываясь на интерфейс TcpConnectionInterface.
Все варианты поведения можно увидеть в тестах.

Для изменения состояния вам понадобится дополнительная логика. Реализуйте ее по своему усмотрению.

src/states/Connected.php src/states/Disconnected.php
Реализуйте классы состояний, так как считаете нужным.
 class TcpConnection implements TcpConnectionInterface
{
    private $ip;
    private $port;
    private $state;

    // BEGIN
    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->setState(states\Disconnected::class);
    }

    public function getCurrentState()
    {
        return $this->state->getName();
    }

    public function connect()
    {
        $this->state->connect();
    }

    public function disconnect()
    {
        $this->state->disconnect();
    }

    public function write($data)
    {
        $this->state->write($data);
    }

    public function setState(string $stateClassName)
    {
        $this->state = new $stateClassName($this);
    }
    // END
}
*/

use App\Connected;
use App\Disconnected;
use PHPUnit\Util\Exception;

class TcpConnection implements TcpConnectionInterface
{
    private $ip;
    private $port;
    private $state;

    // BEGIN (write your solution here)
    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
        $this->state = new Disconnected();
    }
    public function getCurrentState()
    {
        return $this->state->getName();
    }
    public function connect()
    {
        if ($this->getCurrentState() === 'connected') {
            throw new Exception('already connect');
        }
        $this->state = new Connected($this);
    }
    public function disconnect()
    {
        if ($this->getCurrentState() === 'disconnected') {
            throw new Exception('already disconnect');
        }
        $this->state = new Disconnected();
    }
    public function write($data)
    {
        if ($this->getCurrentState() === 'disconnected') {
            throw new Exception('disconnect');
        }
        $this->data = $data;
    }

    // END
}
