<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\TicTacToe;
use App\Easy;
use App\Normal;

class TicTacToeTest extends TestCase
{
    public function testEasyGame()
    {
        $game = new TicTacToe();
        $game->go(2, 2);
        $game->go();
        $game->go(1, 2);
        $game->go();
        $isWinner = $game->go(3, 2);
        $this->assertTrue($isWinner);
    }

    /*public function testEasyGame2()
    {
        $game = new TicTacToe();
        $game->go(2, 2);
        $game->go();
        $game->go(2, 3);
        $this->assertFalse($game->go());
        $this->assertFalse($game->go(3, 3));
        $isWinner = $game->go();
        $this->assertTrue($isWinner);
    }

    public function testEasyGame3()
    {
        $game = new TicTacToe();
        $game->go(1, 1);
        $game->go();
        $this->assertFalse($game->go(2, 2));
        $this->assertFalse($game->go());
        $isWinner = $game->go(3, 3);
        $this->assertTrue($isWinner);
    }

    public function testNormalGame()
    {
        $game = new TicTacToe('normal');
        $game->go(1, 3);
        $game->go();
        $game->go(1, 2);
        $this->assertFalse($game->go());
        $this->assertFalse($game->go(2, 3));
        $isWinner = $game->go();
        $this->assertTrue($isWinner);
    }

    public function testNormalGame2()
    {
        $game = new TicTacToe('normal');
        $game->go();
        $game->go(3, 2);
        $game->go();
        $game->go(2, 1);
        $this->assertFalse($game->go());
        $this->assertFalse($game->go(2, 3));
        $isWinner = $game->go();
        $this->assertTrue($isWinner);
    }
*/
    public function testNormalGame3()
    {
        $game = new TicTacToe('normal');
        $game->go(3, 3);
        $game->go();
        $this->assertFalse($game->go(2, 2));
        $this->assertFalse($game->go());
        $isWinner = $game->go(1, 1);
        $this->assertTrue($isWinner);
    }
}
