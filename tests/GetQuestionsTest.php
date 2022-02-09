<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

use function App\Normalizer\GetQuestions\getQuestions;

/*class GetQuestionsTest extends TestCase
{
    public function testGetQuestions()
    {
        $text1 = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;
        $actual1 = getQuestions($text1);

        $expected1 = "ehu?\none two?";
        $this->assertEquals($expected1, $actual1);
    }
}
*/
