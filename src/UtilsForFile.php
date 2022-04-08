<?php

namespace App\Utils;

use App\Exceptions\FileException;
use App\File;

/*
 * Реализуйте функцию readFiles, которая принимает на вход список файлов и возвращает их содержимое.
 * Если в процессе обработки какого-то файла возникло исключение, то вместо данных этого файла возвращается null.

function readFiles(array $filepaths): array
{
    // BEGIN
    $values = collect($filepaths)
        ->map(fn($filepath) => new File($filepath))
        ->map(function ($file) {
            try {
                return $file->read();
            } catch (\App\Exceptions\FileException $e) {
                return null;
            }
        })->all();
    return $values;
    // END
}
<?php
 */

function readFiles(array $filepaths)
{
    // BEGIN (write your solution here)
    return  array_map(function ($path) {
        try {
            $content = new File($path);
        } catch (FileException $e) {
            return null;
        }
        try {
            $content->read();
        } catch (FileException $e) {
            return null;
        }
        return $content->read();
    }, $filepaths);
    // END
}
