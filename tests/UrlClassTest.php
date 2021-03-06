<?php

namespace App\Tests;

/*class UrlClassTest extends TestCase
{
    public function testUrl1()
    {
        $url = new UrlClass('http://yandex.ru?key=value&key2=value2');
        $this->assertEquals('http', $url->getScheme());
        $this->assertEquals('yandex.ru', $url->getHost());
        $params = [
            'key' => 'value',
            'key2' => 'value2'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertEquals('value', $url->getQueryParam('key'));
        $this->assertEquals('value2', $url->getQueryParam('key2', 'lala'));
        $this->assertEquals('ehu', $url->getQueryParam('new', 'ehu'));
    }

    public function testUrl2()
    {
        $url = new UrlClass('https://google.com?a=b&c=d&lala=value');
        $this->assertEquals('https', $url->getScheme());
        $this->assertEquals('google.com', $url->getHost());
        $params = [
            'a' => 'b',
            'c' => 'd',
            'lala' => 'value'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertNull($url->getQueryParam('key'));
    }
}
*/

use PHPUnit\Framework\TestCase;
use App\UrlClass;

class UrlClassTest extends TestCase
{
    private string $yandexUrl;
    private string $googleUrl;
    protected function setUp(): void
    {
        $this->yandexUrl = 'http://yandex.ru?key=value&key2=value2';
        $this->googleUrl = 'https://google.com:80?a=b&c=d&lala=value';
    }

    public function testYandex()
    {
        $url = new UrlClass($this->yandexUrl);
        $this->assertEquals('http', $url->getScheme());
        $this->assertEquals('yandex.ru', $url->getHost());
        $params = [
            'key' => 'value',
            'key2' => 'value2'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertEquals('value', $url->getQueryParam('key'));
        $this->assertEquals('value2', $url->getQueryParam('key2', 'lala'));
        $this->assertEquals('ehu', $url->getQueryParam('new', 'ehu'));
        $this->assertTrue($url->equals(new UrlClass($this->yandexUrl)));
        $this->assertFalse($url->equals(new UrlClass($this->googleUrl)));
    }

    public function testGoogle()
    {
        $url = new UrlClass($this->googleUrl);
        $this->assertEquals('https', $url->getScheme());
        $this->assertEquals('google.com', $url->getHost());
        $params = [
            'a' => 'b',
            'c' => 'd',
            'lala' => 'value'
        ];
        $this->assertEquals($params, $url->getQueryParams());
        $this->assertNull($url->getQueryParam('key'));
        $this->assertTrue($url->equals(new UrlClass($this->googleUrl)));
        $this->assertFalse($url->equals(new UrlClass('https://google.com')));
        $this->assertFalse($url->equals(new UrlClass(str_replace('80', '443', $this->googleUrl))));
    }
}
