<?php

namespace App\Test;

use PHPUnit\Framework\TestCase;

use function App\Normalizer\normalize;

class NormalizerTest extends TestCase
{
    public function testNormalize()
    {
        $raw = [
            [
                'name' => 'istambul',
                'country' => 'turkey'
            ],
            [
                'name' => 'Moscow ',
                'country' => ' Russia'
            ],
            [
                'name' => 'iStambul',
                'country' => 'tUrkey'
            ],
            [
                'name' => 'antalia',
                'country' => 'turkeY '
            ],
            [
                'name' => 'samarA',
                'country' => '  ruSsiA'
            ],
            [
                'name' => 'istambul',
                'country' => 'usa'
            ],
        ];

        $actual = normalize($raw);
        $expected = [
            'russia' => [
                'moscow', 'samara'
            ],
            'turkey' => [
                'antalia', 'istambul'
            ],
            'usa' => [
                'istambul'
            ]
        ];
        $this->assertEquals($expected, $actual);
    }

    public function testNormalize2()
    {
        $raw = [
            [
                'name' => 'pariS ',
                'country' => ' france'
            ],
            [
                'name' => ' madrid',
                'country' => ' sPain'
            ],
            [
                'name' => 'valencia',
                'country' => 'spain'
            ],
            [
                'name' => 'marcel',
                'country' => 'france'
            ],
            [
                'name' => ' madrid',
                'country' => ' sPain'
            ],
        ];

        $actual = normalize($raw);
        $expected = [
            'france' => [
                'marcel', 'paris'
            ],
            'spain' => [
                'madrid', 'valencia'
            ]
        ];
        $this->assertEquals($expected, $actual);
    }
}
