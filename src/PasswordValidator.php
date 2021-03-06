<?php

namespace App;

/*
 * Валидация - процесс проверки корректности данных. В вебе происходит
 * всегда при отправке форм, например, регистрация на многих сайтах проверяет корректность
 * введенного емейла, его уникальность (что такого пользователя ещё нет).

Каждый тип валидации в таких системах (на PHP) обычно представлен классом-валидатором,
который принимает на вход опции и предоставляет интерфейс в виде функции validate().
Эта функция принимает на вход то что проверяется (валидируется) и возвращает массив с ошибками.
Если массив пустой, значит ошибок нет.

src\PasswordValidator.php
Реализуйте класс PasswordValidator ориентируясь на тесты.

Этот валидатор поддерживает следующие опции:

minLength (по-умолчанию 8) - минимальная длина пароля
containNumbers (по-умолчанию false) - требование содержать хотя бы одну цифру
Массив ошибок в ключах содержит название опции, а в значении текст указывающий на ошибку
(тексты можно подсмотреть в тестах)
class PasswordValidator
{
    // BEGIN
    private const OPTIONS = [
        'minLength' => 8,
        'containNumbers' => false
    ];

    private $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::OPTIONS, $options);
    }

    public function validate(string $password): array
    {
        $errors = [];
        if (mb_strlen($password) < $this->options['minLength']) {
            $errors['minLength'] = 'too small';
        }

        if ($this->options['containNumbers']) {
            if (!$this->hasNumber($password)) {
                $errors['containNumbers'] = 'should contain at least one number';
            }
        }

        return $errors;
    }
    // END

    private function hasNumber(string $subject): bool
    {
        return strpbrk($subject, '1234567890') !== false;
    }
}

 */
class PasswordValidator
{
    private $minLength;
    private $containNumbers;
    private array $options;


    public function __construct($param = [])
    {
        $this->minLength = array_key_exists('minLength', $param) ? $param['minLength'] : 8;
        $this->containNumbers = array_key_exists('containNumbers', $param) ? $param['containNumbers'] : false;
        $this->options = array_key_exists('options', $param) ? $param['options'] :
                ['minLength' => 'too small',
                'containNumbers' => 'should contain at least one number'];
    }

    public function getLength()
    {
        return $this->minLength;
    }

    public function getContainNumbers()
    {
        return $this->containNumbers;
    }

    public function getOptions()
    {
        return $this->options;
    }

    private function hasNumber(string $subject): bool
    {
        return strpbrk($subject, '1234567890') !== false;
    }

    public function validate($password)
    {
        $result = [];
        if (strlen($password) < $this->getLength()) {
            $result['minLength'] = $this->options['minLength'];
        }
        if ($this->containNumbers && !$this->hasNumber($password)) {
            $result['containNumbers'] = $this->options['containNumbers'];
        }

        return $result;
    }
}
