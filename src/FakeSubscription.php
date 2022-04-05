<?php

/*
 * Реализуйте класс FakeSubscription, который повторяет интерфейс класса Subscription за исключением конструктора.
 * В конструктор FakeSubscription принимает пользователя. Если пользователь администратор $user->isAdmin(),
 *  то все доступы разрешены, если нет – то запрещены.

src/User.php
Допишите конструктор пользователя, так, чтобы внутри устанавливалась реальная подписка если она передана снаружи
и создавалась фейковая в ином случае.

Примеры:
<?php

use App\Subscription;
use App\User;

$user = new User('vasya@email.com', new Subscription('premium'));
$user->getCurrentSubscription()->hasPremiumAccess(); // true
$user->getCurrentSubscription()->hasProfessionalAccess(); // false

$user = new User('vasya@email.com', new Subscription('professional'));
$user->getCurrentSubscription()->hasPremiumAccess(); // false
$user->getCurrentSubscription()->hasProfessionalAccess(); // true

// Внутри создается фейковая, потому что подписка не передается
$user = new User('vasya@email.com');
$user->getCurrentSubscription()->hasPremiumAccess(); // false
$user->getCurrentSubscription()->hasProfessionalAccess(); // false

$user = new User('rakhim@hexlet.io'); // администратор, проверяется по емейлу
$user->getCurrentSubscription()->hasPremiumAccess(); // true
$user->getCurrentSubscription()->hasProfessionalAccess(); // true

 */

namespace App;

class FakeSubscription
{
    private $user;

    public function __construct($hexletUser)
    {
            $this->user = $hexletUser;
    }

    public function hasProfessionalAccess()
    {

        return $this->user->isAdmin();
    }

    public function hasPremiumAccess()
    {
        return $this->user->isAdmin();
    }
}
