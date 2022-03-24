<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Brackets\isBalanced;

class IsBalancedTest extends TestCase
{
    public function testIsBalanced()
    {
        $str = '()';
        $this->assertEquals(true, isBalanced($str));

        $str2 = '(())';
        $this->assertEquals(true, isBalanced($str2));

        $str3 = '(()((((())))))';
        $this->assertEquals(true, isBalanced($str3));

        $str4 = '';
        $this->assertEquals(true, isBalanced($str4));

        $str1 = '((';
        $this->assertEquals(false, isBalanced($str1));

        $str2 = '())(';
        $this->assertEquals(false, isBalanced($str2));

        $str3 = '((())';
        $this->assertEquals(false, isBalanced($str3));

        $str4 = '(())())';
        $this->assertEquals(false, isBalanced($str4));

        $str5 = '(()(()))))';
        $this->assertEquals(false, isBalanced($str5));

        $str6 = ')';
        $this->assertEquals(false, isBalanced($str6));

        $str7 = '())(()';
        $this->assertEquals(false, isBalanced($str7));
    }
}
