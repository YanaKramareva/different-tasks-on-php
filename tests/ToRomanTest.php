<?php

namespace App;

use PHPUnit\Framework\TestCase;

use function App\Solution\toRoman;
use function App\Solution\toArabic;

class ToRomanTest extends TestCase
{
    public function testToRoman()
    {
        $this->assertEquals('I', toRoman(1));
        $this->assertEquals('II', toRoman(2));
        $this->assertEquals('IV', toRoman(4));
        $this->assertEquals('V', toRoman(5));
        $this->assertEquals('VI', toRoman(6));
        $this->assertEquals('XXVII', toRoman(27));
        $this->assertEquals('XLVIII', toRoman(48));
        $this->assertEquals('LIX', toRoman(59));
        $this->assertEquals('CLXIII', toRoman(163));
        $this->assertEquals('CDII', toRoman(402));
        $this->assertEquals('DLXXV', toRoman(575));
        $this->assertEquals('CMXI', toRoman(911));
        $this->assertEquals('MXXIV', toRoman(1024));
        $this->assertEquals('MMM', toRoman(3000));
    }

    public function testToArabic()
    {
        $this->assertEquals(1, toArabic('I'));
        $this->assertEquals(2, toArabic('II'));
        $this->assertEquals(4, toArabic('IV'));
        $this->assertEquals(5, toArabic('V'));
        $this->assertEquals(6, toArabic('VI'));
        $this->assertEquals(27, toArabic('XXVII'));
        $this->assertEquals(48, toArabic('XLVIII'));
        $this->assertEquals(59, toArabic('LIX'));
        $this->assertEquals(163, toArabic('CLXIII'));
        $this->assertEquals(402, toArabic('CDII'));
        $this->assertEquals(575, toArabic('DLXXV'));
        $this->assertEquals(911, toArabic('CMXI'));
        $this->assertEquals(1024, toArabic('MXXIV'));
        $this->assertEquals(3000, toArabic('MMM'));

        $this->assertEquals(false, toArabic('IIII'));
        $this->assertEquals(false, toArabic('VX'));
    }
}
