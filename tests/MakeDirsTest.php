<?php

/*namespace App\Tests;

use function App\Implementations\mkdirs;

// phpcs:disable
//require getenv('COMPOSER_VENDOR_DIR') . '/autoload.php';

// phpcs:enable

use PHPUnit\Framework\TestCase;
/*
 Напишите тесты на функцию mkdirs(), которая рекурсивно создает директории для переданного пути.

Подсказки
Для тестирования можно подключить класс vfsStream из библиотеки mikey179/vfsStream:
<?php

use org\bovigo\vfs\vfsStream;
Подробнее о том как им пользоваться можно почитать в документации vfsStream


use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;

class MakeDirsTest extends TestCase
{
    // BEGIN (write your solution here)
    public function setUp(): void
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('exampleDir'));
    }

    public function testDirectoryIsCreated()
    {
        $example = mkdirs('id');
        $this->assertFalse(vfsStreamWrapper::getRoot()->hasChild('id'));

        $example->mkdirs(vfsStream::url('exampleDir'));
        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild('id'));
    }
}
*/