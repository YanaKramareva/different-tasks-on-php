<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Stringify\stringify;

/*class StringifyTest extends TestCase
{
    private string $path = __DIR__ . "/fixtures/";

    private function getFilePath($name)
    {
        return $this->path . $name;
    }

    public function testStringifyPrimitive($value, $expected)
    {
        $this->assertEquals($expected, stringify($value));
    }

    public function stringifyPrimitiveProvider()
    {
        return [
            ['value', 'value'],
            [true, 'true'],
            [5, '5'],
            [1.25, '1.25']
        ];
    }

    protected function setUp(): void
    {
        $this->primitives = [
            'string' => 'value',
            'boolean' => true,
            'number' => 5,
            'float' => 1.25
        ];
        $plainData = file_get_contents($this->getFilePath('plain.txt'));
        $this->expectedPlain = explode("\n\n\n", trim($plainData));

        $this->nested = [
            'string' => 'value',
            'boolean' => true,
            'number' => 5,
            'float' => 1.25,
            'object' => [
                5 => 'number',
                '1.25' => 'float',
                'null' => 'null',
                'true' => 'boolean',
                'value' => 'string',
                'nested' => [
                    'boolean' => true,
                    'float' => 1.25,
                    'string' => 'value',
                    'number' => 5,
                    'null' => 'null'
                ]
            ]
        ];
        $nestedData = file_get_contents($this->getFilePath('nested.txt'));
        $this->expectedNested = explode("\n\n\n", $nestedData);
    }

    public function testStringifyPlain($replacer, $spacesCount, $caseIndex)
    {
        $this->assertEquals($this->expectedPlain[$caseIndex], stringify($this->primitives, $replacer, $spacesCount));
    }

    public function testStringifyNested($replacer, $spacesCount, $caseIndex)
    {
        $this->assertEquals($this->expectedNested[$caseIndex], stringify($this->nested, $replacer, $spacesCount));
    }

    public function stringifyProvider()
    {
        return [
            ['|-', 1, 2],
            ['|-', 2, 3],
            [' ', 3, 4]
        ];
    }

    public function testWithDefaults()
    {
        $this->assertEquals($this->expectedPlain[0], stringify($this->primitives));
        $this->assertEquals($this->expectedPlain[1], stringify($this->primitives, ' '));
        $this->assertEquals($this->expectedPlain[5], stringify($this->primitives, '...'));
        $this->assertEquals($this->expectedNested[0], stringify($this->nested));
        $this->assertEquals($this->expectedNested[1], stringify($this->nested, ' '));
        $this->assertEquals($this->expectedNested[5], stringify($this->nested, '...'));
    }
}
*/