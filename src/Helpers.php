<?php

/*
 * Реализуйте функцию getGreeting($user), которая возвращает приветствие для пользователя.
 * Это приветствие показывается пользователю на сайте. Если пользователь гость, то выводится
 * "Nice to meet you Guest!", если не гость, то "Hello <Имя>!", где "<Имя>" это имя реального пользователя.

В этой задаче, способ решения остается на ваше усмотрение. Используйте знания полученные в этом курсе.

<?php

$guest = new \App\Guest();
getGreeting($guest); // 'Nice to meet you Guest!'

$user = new \App\User('Petr');
getGreeting($user); // 'Hello Petr!'
function getGreeting($user)
{
    $mapping = [
        'guest' => function ($guest) {
            return "Nice to meet you {$guest->getName()}!";
        },
        'user' => function ($user) {
            return "Hello {$user->getName()}!";
        }
    ];
    return $mapping[$user->getTypeName()]($user);
}
 */

namespace App\Helpers;

function getGreeting($user)
{
    return $user->getGreetings();
}
