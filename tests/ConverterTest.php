<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Converter\toStd;

class ConverterTest extends TestCase
{
    public function testConverter()
    {
        $data = [
            'key' => 'value',
            'key2' => 'value2',
        ];
        $config = toStd($data);
        $this->assertEquals((object) $data, $config);

        $data2 = [
            'keysdd' => 'vasdfalue',
            'kasdfey2' => 'asdvalue2',
        ];
        $config = toStd($data2);
        $this->assertEquals((object) $data2, $config);
    }
}
