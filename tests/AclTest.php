<?php

namespace App\Tests;

use App\Acl;
use PHPUnit\Framework\TestCase;
use App\Acl\AccessDenied;
use App\Acl\ResourceUndefined;
use App\Acl\PrivilegeUndefined;

/*
 * ACL (access control list) это механизм проверки доступа определенных ролей к действиям над определенными ресурсами.

Включает понятия:

Роль - кто выполняет действие.
Ресурс - над чем выполняется действие.
Привилегия - какое выполняется действие.
Например, администратор может редактировать карточку пользователя.
 Здесь роль - это администратор, ресурс - карточка пользователя, привилегия - редактировать.

Принцип работы системы ACL из этого упражнения:

<?php

$data = [
    'articles' => [
        'show' => ['editor', 'manager'],
        'edit' => ['editor']
    ],
    'money' => [
        'create' => ['editor'],
        'show' => ['editor', 'manager'],
        'edit' => ['manager'],
        'remove' => ['manager']
    ]
];

$acl = new Acl($data);

$acl->check('articles', 'show', 'manager')
tests/SolutionTest.php
Напишите тесты на функцию check() объекта $acl.
 Функция принимает на вход ресурс, привилегию и роль.

Принцип работы этой функции:
Если не найден ресурс - бросаем исключение Acl\ResourceUndefined.
Если не найдена привилегия - бросаем исключение Acl\PrivilegeUndefined.
Если доступ запрещен - Acl\AccessDenied.
 */


/*namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Acl\{
    Acl,
    AccessDenied,
    ResourceUndefined,
    PrivilegeUndefined
};

// phpcs:disable
require_once 'src/App/Acl/AccessDenied.php';
require_once 'src/App/Acl/ResourceUndefined.php';
require_once 'src/App/Acl/PrivilegeUndefined.php';

// phpcs:enable

class AclTest extends TestCase
{
    private static $data = [
        'articles' => [
            'show' => ['editor', 'manager'],
            'edit' => ['editor']
        ],
        'money' => [
            'create' => ['editor'],
            'show' => ['editor', 'manager'],
            'edit' => ['manager'],
            'remove' => ['manager']
        ]
    ];

    public function testAccessDenied()
    {
        $acl = new Acl(static::$data);

        // BEGIN (write your solution here)
        $this->expectException(AccessDenied::class);
        $this->expectExceptionMessage("Access denied", AccessDenied::class);
        $acl->check('articles', 'edit', 'newUser');
        // END
    }

    // BEGIN (write your solution here)
    public function testResourceUndefined()
    {
        $acl = new Acl(static::$data);

        // BEGIN (write your solution here)
        $this->expectException(ResourceUndefined::class);
        $acl->check('undefinedResourse', 'edit', 'manager');
        // END
    }

    public function testPrivilegeUndefined()
    {
        $acl = new Acl(static::$data);

        // BEGIN (write your solution here)
        $this->expectException(PrivilegeUndefined::class);
        $acl->check('money', 'notprivilege', 'manager');
        // END
    }
}
*/
