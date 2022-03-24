<?php

/*
 * Протестируйте функцию getFilesCount(), которая считает количество всех файлов в указанной директории
 * и всех поддиректориях.

<?php

$filesCount = getFilesCount('/path/to/directory');
У этой функции есть дополнительное поведение. Во время обхода файлов,
 она записывает информацию об этом (какие файлы были задействованы) в специальный файл,
 который называется журналом действий или логом.

Запись в файл является нежелательным побочным эффектом.
Каждый запуск будет заполнять какой-то файл, который мы никак не используем.
 От него нужно избавиться. Все что мы хотим – чтобы функция считала количество файлов.
Сделать это можно так. Для записи в файл, функция getFilesCount(), использует другую функцию,
 которую можно подменить:

<?php

$getFilesCount = ($path, $log) => {
  // Где-то внутри  во время работы
  $log(`file ${name} has been processed`);
};
Для подмены нужно передать вторым параметром функцию-пустышку,
которая не будет ничего делать. В таком случае ее вызов внутри getFilesCount() хоть и отработает,
 но не породит побочного эффекта.

Подсказки
Передайте этой функции путь до директории внутри fixtures и убедитесь в том,
 что она правильно посчитала количество файлов внутри

 * class SolutionTest extends TestCase
{
    public function testGetFilesCount(): void
    {
        $path = realpath(__DIR__ . '/../fixtures/nested');
        //BEGIN
        $filesCount = getFilesCount($path, fn () => null);
        $this->assertEquals(3, $filesCount);
        //END
    }
}
 */

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Implementations\getFilesCount;

/*class GetFilesCountTest extends TestCase
{
    public function testGetFilesCount(): void
    {
        $path = realpath(__DIR__ . '/../fixtures/nested');
        //BEGIN (write your solution here)
        $log =  function (string $log = 'log') {
        };
        $expected = 3;
        $filesCount = getFilesCount($path, $log);
        $this->assertEquals($expected, $filesCount);
        //END
    }
}
*/
