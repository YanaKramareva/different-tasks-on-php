<?php

namespace App;

/*
 *
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

class HexletUser
{
    private $currentSubscription;
    private $email;

    public function __construct($email, $currentSubscription = null)
    {
        $this->email = $email;
        // BEGIN (write your solution here)
        $this->currentSubscription = $currentSubscription ?? new FakeSubscription($this);
        // END
    }

    public function getCurrentSubscription()
    {
        return $this->currentSubscription;
    }

    public function isAdmin()
    {
        return $this->email === 'rakhim@hexlet.io';
    }
}
