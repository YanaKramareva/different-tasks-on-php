<?php

namespace App;

/*
 * Реализуйте класс User, который создает пользователей. Конструктор класса принимает на вход два параметра: идентификатор и имя.

Реализуйте интерфейс Comparable для класса User. Сравнение пользователей происходит на основе их идентификатора.

<?php

$user1 = new User(4, 'tolya');
$user2 = new User(1, 'petya');

$user1->compareTo($user2); // false

class User implements Comparable
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function compareTo($user)
    {
        return $this->getId() === $user->getId();
    }
}}
 */
use App\Comparable;

class User implements Comparable
{
    private $name;
    private $id;

    public function __construct($id, $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function compareTo($user): bool
    {
        return $this->id === $user->id;
    }
}
