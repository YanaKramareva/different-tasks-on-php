<?php

namespace App\Tests;

/*
 * Протестируйте функцию getUserMainLanguage($username, $client),
 *  которая определяет язык на котором пользователь создал больше всего репозиториев.
 *  Для реализации этой задачи, функция getUserMainLanguage() выполняет запрос
 * к веб-сервису при помощи клиента $client , который извлекает все репозитории
 *  указанного пользователя (по первому параметру $username).
 * Каждый репозиторий в этом списке содержит указание основного языка репозитория.
 * Эта информация используется для поиска того языка, которые используется чаще.
 *  Замените клиент тестовым двойником.

Пример:
// Запрос который выполняет функция getUserMainLanguage
// Именно этот метод нужно будет подменить в фейковом клиенте
$data = $client->repos($user);
// data – список репозиториев. У каждого репозитория может быть много полей
// но нас интересует ровно одно – language
// Эти данные нужно подготовить в тестах для фейкового клиента
print_r($data);
// [[ 'language' => 'php', ... ], [ 'language' => 'javascript', ... ], ...]

 */

use App\RepositoryClient;
use PHPUnit\Framework\TestCase;

use function App\getUserMainLanguage;

use Github\Client;

class GetUserMainLanguageTest extends TestCase
{
    public function SetUp(): void
    {
        $this->testRepository = [[ 'language' => 'php', 'user' => 'yana' ],
            [ 'language' => 'javascript', 'user' => 'elena'], [ 'language' => 'php', 'user' => 'yana']];
    }


    public function testGetUserMainLanguage()
    {
        $stub = $this->createMock(RepositoryClient::class);
        $stub->method('repos')
            ->willReturn($this->testRepository);
        $user = 'yana';
        $userMainLanguage = getUserMainLanguage($user, $stub);
        $expected =  'php';
        $this->assertEquals($expected, $userMainLanguage);
    }
}
