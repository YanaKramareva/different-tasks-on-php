<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function App\findFilesByName\findFilesByName;

class Test extends TestCase
{
    public function testFindFilesByName1()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache'),
                mkdir('nginx', [
                    mkfile('nginx.conf', ['size' => 800]),
                ]),
                mkdir('consul', [
                    mkfile('config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $expected = ['/etc/nginx/nginx.conf', '/etc/consul/config.json'];

        $this->assertEquals($expected, findFilesByName($tree, 'co'));
    }

    public function testFindFilesByName2()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache'),
                mkdir('nginx', [
                    mkfile('nginx.conf', ['size' => 800]),
                ]),
                mkdir('consul', [
                    mkfile('config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $this->assertEquals([], findFilesByName($tree, 'toohard'));
    }

    public function testFindFilesByName3()
    {
        $tree = mkdir('/', [
            mkdir('etc', [
                mkdir('apache'),
                mkdir('nginx', [
                    mkfile('nginx.conf', ['size' => 800]),
                ]),
                mkdir('consul', [
                    mkfile('config.json', ['size' => 1200]),
                    mkfile('data', ['size' => 8200]),
                    mkfile('raft', ['size' => 80]),
                ]),
            ]),
            mkfile('hosts', ['size' => 3500]),
            mkfile('resolve', ['size' => 1000]),
        ]);

        $this->assertEquals(['/etc/consul/data'], findFilesByName($tree, 'data'));
    }
}
