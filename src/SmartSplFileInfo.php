<?php

/*
 * В стандартной библиотеке PHP есть класс SplFileInfo.
 * Объекты этого класса описывают собой файлы.
 * С их помощью можно получать любую метаинформацию о файле.

<?php

$file = new SplFileInfo('/etc/hosts');
echo $file->getSize();
src\SmartSplFileInfo.php
Реализуйте класс SmartSplFileInfo наследующийся от SplFileInfo.
Этот класс должен расширять поведение метода getSize.
В новом классе этот метод принимает на вход аргумент, который обозначает единицу измерения возвращаемых данных.
По умолчанию это b, то есть байты. Но можно передать и kb, то есть килобайты.
В случае килобайтов, переопределённый метод делит байты на 1024 и получившееся значение возвращает наружу.

Метод должен обрабатывать ситуацию, когда на вход поступает что-то другое, кроме указанных значений.
Обработка сводится к возбуждению исключения Exception.

<?php

$file = new SmartSplFileInfo(__DIR__ . '/../Makefile');
$file->getSize();
$file->getSize('b');
$file->getSize('kb');

class SmartSplFileInfo extends \SplFileInfo
{
    public function getSize($unit = 'b')
    {
        $size = parent::getSize();
        switch ($unit) {
            case 'b':
                return $size;
            case 'kb':
                return $size / 1024;
            default:
                throw new \Exception("Unknown unit name: {$unit}");
        }
    }
}
 */


namespace App;

// BEGIN (write your solution here)
class SmartSplFileInfo extends \SplFileInfo
{
    public function getSize(string $mesure = 'b')
    {
        switch ($mesure) {
            case '':
            case 'b':
                return parent::getSize();
            case 'kb':
                $size = parent::getSize();
                return $size / 1024;
            default:
                throw new \Exception('error');
        }
    }
}
// END
