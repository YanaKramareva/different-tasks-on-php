<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\buildUser;

/*
 * Протестируйте функцию, которая генерирует случайного пользователя. Пользователь, в данном случае, это ассоциативный массив с тремя ключами:

email
firstName
lastName
Для генерации данных используется библиотека FakerPHP

<?php

print_r(buildUser());
// [
//   'email' => 'Zion.Reichel12@yahoo.com',
//   'firstName' => 'Elizabeth',
//   'lastName' => 'Zulauf',
// ]

// Если какой-то из параметров нужно задать точно, то его можно передать в функцию
print_r(buildUser(['firstName' => 'Petya' ]));
// [
//   'email' => 'Zion.Reichel12@yahoo.com',
//   'firstName' => 'Petya',
//   'lastName' => 'Zulauf',
// ]
Вам нужно протестировать три ситуации:

Что вызов buildUser() возвращает объект нужной структуры.
Что каждый вызов buildUser возвращает объект с другими данными.
Что работает установка свойств через параметры.

 * public function testBuildUserFields(): void
    {
        $user = buildUser();
        $this->assertArrayHasKey('firstName', $user);
        $this->assertArrayHasKey('lastName', $user);
        $this->assertArrayHasKey('email', $user);
    }

    public function testBuildUserRandom(): void
    {
        $user1 = buildUser();
        $user2 = buildUser();
        $this->assertNotEquals($user1, $user2);
    }

    public function testBuildUserOverride(): void
    {
        $user = buildUser(['email' => 'test@email.com']);
        $this->assertEquals('test@email.com', $user['email']);
    }
 */
class BuildUserTest extends TestCase
{
    private $data = [
    'email' => 'email',
    'firstName' => 'Yana',
    'lastName' => 'K'
    ];
    public function testBuildUser2()
    {
        $user1Keys = array_keys($this->data);
        $user2 = buildUser();
        $user2Keys = array_keys($user2);
        $this->assertEquals($user1Keys, $user2Keys);
    }

    public function testBuildUser3()
    {
        $user1 = buildUser();
        $user2 = buildUser();
        $this->assertNotEquals($user1, $user2);
    }

    public function testBuildUser4()
    {
        $this->assertEquals($this->data, buildUser($this->data));
    }
}
