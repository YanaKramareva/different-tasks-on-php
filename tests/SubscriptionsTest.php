<?php

namespace App\Tests;

use App\HexletUser;
use PHPUnit\Framework\TestCase;
use App\Subscription;
use App\User;

class SubscriptionsTest extends TestCase
{
    public function testSubscriptions()
    {
        $user = new HexletUser('vasya@email.com', new Subscription('premium'));
        $result = $user->getCurrentSubscription()->hasPremiumAccess(); // true
        $this->assertTrue($result);
        $result = $user->getCurrentSubscription()->hasProfessionalAccess(); // false
        $this->assertFalse($result);

        $user = new HexletUser('vasya@email.com', new Subscription('professional'));
        $result = $user->getCurrentSubscription()->hasPremiumAccess(); // false
        $this->assertFalse($result);
        $result = $user->getCurrentSubscription()->hasProfessionalAccess(); // true
        $this->assertTrue($result);

        $user = new HexletUser('vasya@email.com');
        $result = $user->getCurrentSubscription()->hasPremiumAccess(); // false
        $this->assertFalse($result);
        $result = $user->getCurrentSubscription()->hasProfessionalAccess(); // false
        $this->assertFalse($result);

        $user = new HexletUser('rakhim@hexlet.io'); // администратор, проверяется по емейлу
        var_dump($user);
        $result = $user->getCurrentSubscription()->hasPremiumAccess(); // true
        var_dump($result);
        $this->assertTrue($result);
        $result = $user->getCurrentSubscription()->hasProfessionalAccess(); // true
        var_dump($result);
        $this->assertTrue($result);
    }
}
