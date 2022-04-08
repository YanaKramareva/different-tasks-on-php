<?php

/*
 * В этом упражнении мы попробуем воспользоваться библиотекой PHP-DI для сборки приложения.

В самом приложении есть три сущности:

Класс Application. Представим что это и есть само приложение. Через конструктор он принимает логгер
(обязательно посмотрите на определение конструктора). Метод run() запускает приложение на выполнение.
Для простоты, внутри метода run() логгируется фраза The application has been started!. Именно ее ожидают увидеть тесты.
LoggerInterface интерфейс с одним методом info($message)
Logger – конкретный логгер, реализующий интерфейс LoggerInterface
Приложение можно собрать и запустить на выполнение так:

<?php

$app = new Application(new Logger());
$app->run();
Это ручной способ, который отлично работает пока кода мало, и становится тяжелым,
 когда количество объектов превысит десятки.
Ваша задача состоит в том, чтобы собрать приложение с помощью библиотеки PHP-DI.
Результатом сборки станет ровно тоже приложение что и в примере выше,
но сам процесс компоновки выполнится с помощью контейнера. Для реализации этого кода,
вам потребуется провести немного времени в документации.

Что потребуется:

Контейнер – это объект класса \DI\Container
Контейнер нужно заполнить классами. Для этого используется метод set
При добавлении классов в контейнер, испольуйте функцию \DI\autowire
Для извлечения готового приложения из контейнера, понадобится метод get
Пример работы DI:

<?php

// Класс приложения
class Application {
    public function __constructor(DatabaseInterface $db) {
        // some code
    }

    // some methods
}

class Postgresql implements DatabaseInterface {
    // some methods
}

$container = new \DI\Container();
// Первый параметр - интерфейс, второй - конкретная реализация, которую надо использовать
$container->set(DatabaseInterface::class, \Di\autowire(Postgresql::class));
$container->set(Application::class, \DI\autowire(Application::class));
// get запускает процесс сборки приложения. Контейнер анализирует зависимости на основании сигнатур функций
(см. конструктор в Application)
// и создает необходимые объекты. Процесс формирования приложения выглядит как сборка матрешки.
$app = $container->get(Application::class);
src/Main.php
Реализуйте функцию buildApplication(), которая собирает приложение и возвращает его наружу.

 */

namespace App\Main;

use App\Logger;
use App\Application;
use App\LoggerInterface;
use DI\Container;

function buildApplication()
{
    $container = new \DI\Container();
    $container->set(LoggerInterface::class, \Di\autowire(Logger::class));
    $app = $container->get(Application::class);
    return $app;
}
