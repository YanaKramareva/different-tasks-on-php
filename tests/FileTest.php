<?php

namespace App\Tests;

use App\File;
use PHPUnit\Framework\TestCase;

class FileTest extends TestCase
{
    public function testRead()
    {
        $file = new File('/etc/fstab');
        $this->assertNotNull($file->read());
    }

    public function testRead2()
    {
        $this->expectException(\App\Exceptions\NotExistsException::class);
        $file = new File('/etc/wopwop');
        $file->read();
    }

    public function testRead3()
    {
        $this->expectException(\App\Exceptions\NotReadableException::class);
        $file = new File('/etc/shadow');
        $file->read();
    }
}
