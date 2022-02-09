<?php

namespace App\Tests;

use App\Url;
use PHPUnit\Framework\TestCase;

/*class UrlTest extends TestCase
{
    public function testUrl()
    {
        $url = Url\make('https://hexlet.io/community?q=low');
        $this->assertEquals('https://hexlet.io/community?q=low', Url\toString($url));
        $this->assertEquals('https', Url\getScheme($url));
        $this->assertEquals('hexlet.io', Url\getHost($url));
        $this->assertEquals('/community', Url\getPath($url));

        Url\setScheme($url, 'http');
        $this->assertEquals('http://hexlet.io/community?q=low', Url\toString($url));

        Url\setHost($url, 'code-basics.com');
        $this->assertEquals('http://code-basics.com/community?q=low', Url\toString($url));

        Url\setScheme($url, 'https');
        Url\setHost($url, 'hexlet.io');
        Url\setPath($url, '/404');
        $this->assertEquals('https://hexlet.io/404?q=low', Url\toString($url));

        Url\setQueryParam($url, 'page', 5);
        $this->assertEquals('https://hexlet.io/404?q=low&page=5', Url\toString($url));

        Url\setQueryParam($url, 'q', 'high');
        $this->assertEquals('https://hexlet.io/404?q=high&page=5', Url\toString($url));
        $this->assertEquals('high', Url\getQueryParam($url, 'q'));
        $this->assertEquals('guest', Url\getQueryParam($url, 'user', 'guest'));
        $this->assertNull(Url\getQueryParam($url, 'b'));

        Url\setQueryParam($url, 'q', null);
        $this->assertEquals('https://hexlet.io/404?page=5', Url\toString($url));

        Url\setQueryParam($url, 'q', null);
        $this->assertEquals('https://hexlet.io/404?page=5', Url\toString($url));
    }

    public function testUrlWithEmptyParams()
    {
        $url = Url\make('https://hexlet.io/community');
        $this->assertEquals('https://hexlet.io/community', Url\toString($url));
    }

    public function testUrlWithEmptyPath()
    {
        $url = Url\make('https://hexlet.io/?q=high&page=5');
        $this->assertEquals('https://hexlet.io/?q=high&page=5', Url\toString($url));
    }
}
*/
