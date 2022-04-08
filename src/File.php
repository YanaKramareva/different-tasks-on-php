<?php

/*
 * Создайте класс File, который представляет собой абстракцию над файлом (упрощенная версия SplFileInfo).
 * Реализуйте в этом классе метод read(). Этот метод проверяет можно ли прочитать файл и если да,
 * то читает его, если нет, то бросает исключения двух видов:

Если файла не существует – App\Exceptions\NotExistsException
Если файл нельзя прочитать (но он существует) – App\Exceptions\NotReadableException
<?php

$file = new File('/etc/fstab');
$file->read();
src/Exceptions/FileException
Реализуйте класс FileException, который наследуется от Exception. Это базовое исключение для данной библиотеки.

src/Exceptions/NotReadableException, src/Exceptions/NotExistsException
Реализуйте классы исключения. Они должны наследоваться от базового класса исключений для данной библиотеки.

Utils
Реализуйте функцию readFiles, которая принимает на вход список файлов и возвращает их содержимое.
Если в процессе обработки какого-то файла возникло исключение, то вместо данных этого файла возвращается null.

<?php

$values = Utils\readFiles(['/etc/fstab', '/etc/unknown']);
print_r($value);
// ["какие-то данные", null]
Подсказки
is_readable
file_exists

 */
namespace App;

use App\Exceptions\FileException;
use App\Exceptions\NotExistsException;
use App\Exceptions\NotReadableException;

class File
{
    protected $filepath;

    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }

    public function read(): string
    {
        $filepath = $this->filepath;

        if (!file_exists($filepath)) {
            throw new Exceptions\NotExistsException("'$filepath' does not exist");
        }
        if (!is_readable($filepath)) {
            throw new Exceptions\NotReadableException("'$filepath' does not read");
        }

        return file_get_contents($filepath);
    }
}
