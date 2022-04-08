<?php

namespace App;

/*
 * Адаптер – популярный шаблон проектирования. Он используется тогда, когда нужно использовать код,
 *  не поддерживающий необходимый интерфейс. В такой ситуации, создается "обертка" над необходимым кодом,
 *  которая поддерживает нужный интерфейс. Это очень похоже на адаптеры электронных устройств в реальной жизни.

В текущем задании, есть код отвечающий за генерацию паролей, он находится в классе PasswordBuilder.
Для генерации паролей, этот класс использует внешний объект, класс которого реализует
 интерфейс PasswordGeneratorInterface.

Суть данного задания, внедрить в эту систему внешнюю библиотеку, которая
не поддерживает интерфейс PasswordGeneratorInterface.

Обратите внимание на то, что задача решается не через исправление кода самой библиотеки,
а за счет создания адаптера, благодаря которому соединяется код задания и код библиотеки.

src/HackzillaPasswordGeneratorAdapter.php
Напишите класс HackzillaPasswordGeneratorAdapter, который представляет собой адаптер к
пакету hackzilla/password-generator. Реализуйте внутри него интерфейс PasswordGeneratorInterface.

Примеры:
<?php

$builder = new PasswordBuilder(new HackzillaPasswordGeneratorAdapter());
// Первый параметр — длина пароля (setLength в генераторе)

// Второй — набор опций
// Для настройки генератора смотрите официальную документацию https://github.com/hackzilla/password-generator

$passwordInfo = $builder->buildPassword(10, ['upperCase', 'symbols']);
// (
//    [password] => Pjz+(/gn/T
//    [digest] => dd1ae3051044c9edc2b32191a4ad39be076eddd7
// )

$passwordInfo2 = $builder->buildPassword(10, []);
// (
//    [password] => pvtetwmdcf
//    [digest] => ae334a6cbfb40ba57832fa8ac55a95b77923a0d9
// )
Вторым параметром в buildPassword передается набор опций:

upperCase
numbers
symbols
Каждая из этих опций, соответствует опциям внутри библиотеки hackzilla/password-generation.
 В официальной документации видно как их можно установить.
Значение по умолчанию для данных опций, должно быть false.

Подсказки
Адаптер

private $options = [
        'upperCase' => ComputerPasswordGenerator::OPTION_UPPER_CASE,
        'numbers' => ComputerPasswordGenerator::OPTION_NUMBERS,
        'symbols' => ComputerPasswordGenerator::OPTION_SYMBOLS
    ];

    public function generatePassword($length, $options)
    {
        $generator = new ComputerPasswordGenerator();
        $generator->setLength($length);
        foreach ($this->options as $optionName => $optionValue) {
            $value = in_array($optionName, $options);
            $generator->setOptionValue($optionValue, $value);
        }
        return $generator->generatePassword();
    }
 */


use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

class HackzillaPasswordGeneratorAdapter implements PasswordGeneratorInterface
{
    private object $generator;
    private $options = [
        'upperCase' => ComputerPasswordGenerator::OPTION_UPPER_CASE,
        'numbers' => ComputerPasswordGenerator::OPTION_NUMBERS,
        'symbols' => ComputerPasswordGenerator::OPTION_SYMBOLS
    ];

    public function __construct()
    {
        $this->generator = new ComputerPasswordGenerator();
    }
    // BEGIN (write your solution here)
    public function generatePassword($length, $options)
    {
         $this->generator
             ->setLength($length);
        foreach ($this->options as $optionName => $optionValue) {
            $value = in_array($optionName, $options);
                $this->generator
                    ->setOptionValue($optionValue, $value);
        }
        return $this->generator->generatePassword();
    }
    // END
}
