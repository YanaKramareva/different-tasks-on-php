<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Rational\makeRat;
use function App\Rational\equalRat;
use function App\Rational\subRat;
use function App\Rational\numer;
use function App\Rational\denom;

class RationalTest extends TestCase
{
    public function testEqualRat()
    {
        $firstNum = 5;
        $secondNum = 3;
        $rat = makeRat($firstNum, $secondNum);
        $sameRat = makeRat($firstNum * 2, $secondNum * 2);
        $oppositRat = makeRat($secondNum, $firstNum);

        $this->assertTrue(equalRat($rat, $rat));
        $this->assertTrue(equalRat($rat, $sameRat));
        $this->assertFalse(equalRat($rat, $oppositRat));
    }

    public function testSubRat()
    {
        $firstNum = 5;
        $secondNum = 3;
        $rat = makeRat($firstNum, $secondNum);
        $sameRat = makeRat($firstNum * 2, $secondNum * 2);
        $oppositRat = makeRat($secondNum, $firstNum);

        $newRat = subRat($rat, $rat);
        $this->assertEquals(0, numer($newRat));
        $this->assertEquals($secondNum ** 2, denom($newRat));

        $newRat2 = subRat($oppositRat, $rat);
        $this->assertEquals(-16, numer($newRat2));
        $this->assertEquals($secondNum * $firstNum, denom($newRat2));
    }
}
