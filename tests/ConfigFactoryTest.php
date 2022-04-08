<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\ConfigFactory;

class ConfigFactoryTest extends TestCase
{
    public function testYml()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test.yml');
        $this->assertEquals('value', $config->key);
    }

    public function testYaml()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test2.yaml');
        $this->assertEquals('another value', $config->key);
    }

    public function testJson()
    {
        $config = ConfigFactory::build(__DIR__ . '/fixtures/test.json');
        $this->assertEquals('something else', $config->key);
    }
}
