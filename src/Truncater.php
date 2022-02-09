<?php

namespace App;

/*
 * Для работы с текстом в вебе бывает полезна функция truncate(), которая обрезает слишком длинный текст
 * и ставит в конце, например, многоточие:

<?php

truncate('long text', ['length' => 3]); // lon...
src\Truncater.php
Реализуйте класс Truncater с единственным методом truncate(). В классе уже присутствует конфигурация по умолчанию:

<?php

const OPTIONS = [
    'separator' => '...',
    'length' => 200,
];
separator отвечает за символ(ы) добавляющиеся в конце, после обрезания строки, а
 length это длина до которой происходит сокращение. Если строка короче чем эта опция,
то никакого сокращения не происходит. Конфигурацию по умолчанию можно переопределить
передав новую в конструктор (она мержится с тем что в классе),
а также через передачу конфигурации вторым параметром в метод truncate().
Оба этих способа можно комбинировать.

Примеры
<?php

$truncater = new Truncater();

$actual = $truncater->truncate('one two');
$this->assertEquals('one two', $actual);

$actual = $truncater->truncate('one two', ['length' => 6]);
$this->assertEquals('one tw...', $actual);

$actual = $truncater->truncate('one two', ['separator' => '.']);
$this->assertEquals('one two', $actual);

$actual = $truncater->truncate('one two', ['length' => '3']);
$this->assertEquals('one...', $actual);

private $options = [];

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function truncate(string $text, array $options = []): string
    {
        $currentOptions = array_merge($this->options, $options);
        if (mb_strlen($text) <= $currentOptions['length']) {
            return $text;
        }
        $substr = mb_substr($text, 0, $currentOptions['length']);
        return "{$substr}{$currentOptions['separator']}";
    }
    // END
}
 */

class Truncater
{
    public const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];

    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function truncate($string, $options = [])
    {
        $truncater = new Truncater(array_merge($this->options, $options));
        return $truncater->options['length'] < mb_strlen($string) ? substr($string, 0, $truncater->options['length']) . $truncater->options['separator'] : $string;
    }
}
