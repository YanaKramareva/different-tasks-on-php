<?php

namespace ForkedRepository;

use Github\Client;

/*function getForkedRepositories($org, $client = null)
{
    // Создаем по умолчанию чтобы не усложнять основной вариант использования
    $client = $client ?? new \Github\Client();
    // Возвращает список репозиториев пользователя/организации
    $repositories = $client->api('user')->repositories($org);
    return array_filter($repositories, fn($repository) => $repository['fork']);
}

*/