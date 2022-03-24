<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use org\bovigo\vfs\{
    vfsStream,
    vfsStreamDirectory
};

class VirtualFileSystemTest extends TestCase
{
    /**
     * @var  vfsStreamDirectory
     */
    private $root;

    public function setUp(): void
    {
        $this->root = vfsStream::setup('exampleDir');
    }

    public function testDirectoryIsCreated()
    {
        $directoryPath = vfsStream::url('exampleDir');
        $innerDirectoryPath = $directoryPath . '/inner';
        mkdir($innerDirectoryPath);
        // Проверяем что внутри exampleDir есть inner
        $this->assertTrue($this->root->hasChild('inner'));
    }
}
