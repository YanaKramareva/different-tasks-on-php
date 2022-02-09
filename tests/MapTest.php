<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function App\solution\map;

/*class MapTest extends TestCase
{
    public function testMap()
    {
        $tree = mkdir('/', [
            mkdir('eTc', [
                mkdir('NgiNx'),
                mkdir('CONSUL', [
                    mkfile('config.json'),
                ]),
            ]),
            mkfile('hOsts'),
        ]);

        $expected = [
            'children' => [
                [
                    'children' => [
                        [
                            'children' => [],
                            'meta' => [],
                            'name' => 'NGINX',
                            'type' => 'directory',
                        ],
                        [
                            'children' => [['meta' => [], 'name' => 'CONFIG.JSON', 'type' => 'file']],
                            'meta' => [],
                            'name' => 'CONSUL',
                            'type' => 'directory',
                        ],
                    ],
                    'meta' => [],
                    'name' => 'ETC',
                    'type' => 'directory',
                ],
                ['meta' => [], 'name' => 'HOSTS', 'type' => 'file'],
            ],
            'meta' => [],
            'name' => '/',
            'type' => 'directory',
        ];


        $actual = map(fn($node) => array_merge($node, ['name' => strtoupper(getName($node))]), $tree);

        $this->assertEquals($expected, $actual);
    }
}
*/
