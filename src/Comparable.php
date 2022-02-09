<?php

namespace App;

/*
 * Реализуйте класс User, который создает пользователей.
 * Конструктор класса принимает на вход два параметра: идентификатор и имя.

Реализуйте интерфейс Comparable для класса User. Сравнение пользователей происходит на основе их идентификатора.

<?php

$user1 = new User(4, 'tolya');
$user2 = new User(1, 'petya');

$user1->compareTo($user2); // false

 */

interface Comparable
{
    public function __construct($id, $name);
    public function getId();
    public function getName();
}
