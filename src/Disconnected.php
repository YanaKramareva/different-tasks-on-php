<?php

namespace App;

/*
 *  * HTTP – протокол без состояния, то есть после запроса получается ответ и на этом все заканчивается.
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

class Disconnected
{
    // BEGIN
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getName()
    {
        return 'disconnected';
    }

    public function connect()
    {
        $this->connection->setState(Connected::class);
    }

    public function disconnect()
    {
        throw new \Exception('Connection already disconnected');
    }

    public function write($data)
    {
        throw new \Exception('It is not possible write to closed connection');
    }
    // END
}
 */
class Disconnected
{
    private $state;

    public function __construct()
    {
        $this->state = 'disconnected';
    }

    public function getName()
    {
        return $this->state;
    }
}
