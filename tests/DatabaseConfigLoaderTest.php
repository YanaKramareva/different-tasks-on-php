<?php

namespace App\Tests;

use App\DatabaseConfigLoader;
use PHPUnit\Framework\TestCase;

class DatabaseConfigLoaderTest extends TestCase
{
    private $loader;

    public function setUp(): void
    {
        $this->loader = new DatabaseConfigLoader(__DIR__ . '/fixtures');
    }

    public function testLoad1()
    {
        $config = $this->loader->load('production');
        $expected = [
            'host' => 'google.com',
            'username' => 'postgres'
        ];
        $this->assertEquals($expected, $config);
    }

    public function testLoad2()
    {
        $config = $this->loader->load('custom');
        $expected = [
            'username' => 'mysupername'
        ];
        $this->assertEquals($expected, $config);
    }

    public function testLoadWithExtend()
    {
        $config = $this->loader->load('development');
        $expected = [
            'host' => 'localhost',
            'username' => 'postgres',
            'port' => 5000,
        ];
        $this->assertEquals($expected, $config);
    }
}
