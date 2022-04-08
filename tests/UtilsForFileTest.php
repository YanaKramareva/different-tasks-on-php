<?php

namespace App\Tests;

use App\File;
use App\Utils;
use PHPUnit\Framework\TestCase;

class UtilsForFileTest extends TestCase
{
   /* public function testReadFiles()
    {
        $values = Utils\readFiles([]);
        $this->assertEquals([], $values);
    }
*/
    public function testReadCorrectFiles()
    {
        $values = Utils\readFiles(['/etc/fstab', '/etc/shadow']);
        $this->assertCount(2, $values);
    }

    public function testReadWrongFiles()
    {
        $values = Utils\readFiles(['/etc/shadow', '/opt/asdf']);
        $this->assertNull($values[1]);
    }
}
