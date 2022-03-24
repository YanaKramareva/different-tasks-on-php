<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Solution\fizzBuzz;

class FizzBuzzTest extends TestCase
{
    public function testFizzBuzz1()
    {
        fizzBuzz(1, 2);
        $resultData = [1, 2];
        $result = implode(' ', $resultData);
        $this->setOutputCallback(function ($out) use ($result) {
            $this->assertEquals($result, trim($out));
        });
    }

    public function testFizzBuzz2()
    {
        fizzBuzz(3, 10);
        $resultData = ['Fizz', 4, 'Buzz', 'Fizz', 7, 8, 'Fizz', 'Buzz'];
        $result = implode(' ', $resultData);
        $this->setOutputCallback(function ($out) use ($result) {
            $this->assertEquals($result, trim($out));
        });
    }

    public function testFizzBuzz3()
    {
        fizzBuzz(8, 20);
        $resultData = [8, 'Fizz', 'Buzz', 11, 'Fizz', 13, 14, 'FizzBuzz', 16, 17, 'Fizz', 19, 'Buzz'];
        $result = implode(' ', $resultData);
        $this->setOutputCallback(function ($out) use ($result) {
            $this->assertEquals($result, trim($out));
        });
    }

    public function testFizzBuzz4()
    {
        fizzBuzz(10, 2);
        $this->setOutputCallback(function ($out) {
            $this->assertEmpty(trim($out));
        });
    }

    public function testFizzBuzz5()
    {
        fizzBuzz(10, 10);
        $result = 'Buzz';
        $this->setOutputCallback(function ($out) use ($result) {
            $this->assertEquals($result, trim($out));
        });
    }
}
