<?php

// phpcs:disable PSR1.Files.SideEffects

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function  App\IsPalindrome\isPalindrome;

class IsPalindromeTest extends TestCase
{
    public function testIsPalindrome()
    {
        $this->assertTrue(isPalindrome('absba'));
        $this->assertTrue(isPalindrome('radar'));
        $this->assertTrue(isPalindrome('a'));
        $this->assertTrue(isPalindrome('404'));
        $this->assertTrue(isPalindrome('abba'));

        $this->assertFalse(isPalindrome('absda'));
        $this->assertFalse(isPalindrome('absdba'));
        $this->assertFalse(isPalindrome('palindrome'));
        $this->assertFalse(isPalindrome('aashgkhdj'));
    }
}
