<?php

/*
 * src/Exceptions/FileException
Реализуйте класс FileException, который наследуется от Exception. Это базовое исключение для данной библиотеки.
 */
// BEGIN (write your solution here)
namespace App\Exceptions;

class FileException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
// END
