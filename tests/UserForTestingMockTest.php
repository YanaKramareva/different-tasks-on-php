<?php

/*
 * Существует подход для работы с базой данных, в котором сама сущность отвечает за свое сохранение в базу.
 *  Этот подход называется ActiveRecord. С точки зрения грамотной архитектуры это решение
 * не очень хорошее, но благодаря простой реализации является весьма популярным среди программистов.
 *  Да и большинство фреймворков внутри себя содержат orm, реализованную именно как ActiveRecord.

tests/SolutionTest.php
Напишите тесты на то, что внутри класса User правильно вызывается метод query() объекта,
 отвечающего за соединение с базой данных. Правила работы метода query() такие:

Вызов save на свежесозданном объекте приводит к однократному вызову query().
Повторный вызов (без изменения объекта) не выполняет запроса к базе.
Вызов методов setFirstName() или setLastName() приводит к тому что сохранение снова выполнит запрос.
<?php

$connection = new Db();
$user = new User($connection);

$user->save(); // true
$user->setFirstName("John");
$user->save(); // true
$user->save(); // false

private $user;
    private $connection;

    public function setUp(): void
    {
        $this->connection = $this->getMockBuilder('App\DbInterface')
            ->setMethods(['query'])
            ->getMock();

        $this->user = new User($this->connection);
    }

    public function testSaveNew()
    {
        $this->connection->expects($this->once())
            ->method('query');

        $this->user->save();
    }

    public function testTrySaveTwice()
    {
        $this->connection->expects($this->once())
            ->method('query');

        $this->user->save();
        $this->user->save();
    }

    public function testSaveTwiceWithFirstName()
    {
        $this->connection->expects($this->exactly(2))
            ->method('query');

        $this->user->save();
        $this->user->setFirstName('John');
        $this->user->save();
    }

    public function testSaveTwiceWithLastName()
    {
        $this->connection->expects($this->exactly(2))
            ->method('query');

        $this->user->save();
        $this->user->setLastName('Smith');
        $this->user->save();
    }
 */

/*namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Variant\UserForTestingMock;

class UserForTestingMockTest extends TestCase
{
    public function setUp(): void
    {
        $this->mockDb = $this->getMockBuilder('App\DbInterface')
            ->setMethods(['query'])
            ->getMock();
        $this->user  = new UserForTestingMock($this->mockDb);
    }
    // BEGIN (write your solution here)
    public function testSaveNew1()
    {
        $this->mockDb->expects($this->once())
            ->method('query');
        $this->user->save();
    }
    public function testSaveNew2()
    {
        $this->mockDb->expects($this->once())
            ->method('query');
        $this->user->save();
        $this->user->save();
    }
    public function testSaveNew3()
    {
        $this->mockDb->expects($this->exactly(2))
            ->method('query');
        $this->user->setFirstName('Yana');
        $this->user->save();
        $this->user->setLastName('Kramareva');
        $this->user->save();
    }
}
*/
