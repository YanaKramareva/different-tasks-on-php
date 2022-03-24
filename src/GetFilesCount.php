<?php

namespace App\Implementations;

function getFilesCount($path, $log = null)
{
    $defaultLogger = function () {
        throw new \Error('Can not send data to log');
    };
    $logger = $log ?? $defaultLogger;
    $iterator = new \FilesystemIterator($path, \FilesystemIterator::SKIP_DOTS);
    $logger();
    return iterator_count($iterator);
}
