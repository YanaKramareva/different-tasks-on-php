<?php

/*
 * TicTacToe – известная игра в крестики нолики, на поле 3x3.
 * В этом задании, вам предстоит реализовать данную игру. Основной движок игры находится в файле TicTacToe.php.
 * В директории strategies находится код, который отвечает за поведение AI (искусственный интелект!).
 * В зависимости от выбранного уровня игры, включается либо Easy стратегия, либо Normal.

Задание специально построено так, чтобы предоставить вам максимальную свободу в организации кода.
Результат будет хорошей лакмусовой бумажкой, по которой можно оценить насколько архитектурная тема была понята.

src/TicTacToe.php
Реализуйте класс TicTacToe, который представляет собой игру крестики-нолики.
Принцип его работы описан в коде ниже:

<?php

// По умолчанию выбран easy уровень. Его можно изменить, передав в конструктор строку 'normal'
$game = new TicTacToe();
// Если переданы аргументы, то ходит игрок. Первый аргумент – строка, второй – столбец.
$game->go(2, 2);
// Ход компьютера
$game->go();
$game->go(1, 2);
$game->go();
// Метод go возвращает true, если текущий ход победный и false в ином случае
$isWinner = $game->go(3, 2); // true

src/strategies/Easy.php
Реализуйте стратегию, которая пытается заполнить поля, пробегаясь построчно слева направо и сверху вниз.
Как только она встречает свободное поле, то вставляет туда значение.

src/strategies/Normal.php
Реализуйте стратегию, которая пытается заполнить поля, пробегаясь построчно снизу вверх и слева направо.
 Как только она встречает свободное поле, то вставляет туда значение.

Подсказки
Кто отвечает за состояние игры, и где оно должно храниться?
Не мудрите с проверкой победителя, реализуйте эту логику в лоб.
    // BEGIN
    private $strategy;
    private $map;

    // implementation without inversion of control
    public function __construct($level = 'easy')
    {
        switch ($level) {
            case 'easy':
                $this->strategy = new strategies\Easy();
                break;
            case 'normal':
                $this->strategy = new strategies\Normal();
                break;
        }
        $this->map = [
            1 => array_fill(1, 3, null),
            2 => array_fill(1, 3, null),
            3 => array_fill(1, 3, null)
        ];
    }

    public function go($row = null, $col = null)
    {
        if ($row === null || $col === null) {
            [$autoRow, $autoCol] = $this->strategy->getNextStep($this->map);
            $this->map[$autoRow][$autoCol] = 'AI';
            return $this->isWinner('AI');
        }
        $this->map[$row][$col] = 'Player';
            return $this->isWinner('Player');
    }

    private function isWinner($type)
    {
        foreach ($this->map as $row) {
            if ($this->populatedByOnePlayer($row, $type)) {
                return true;
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            if ($this->populatedByOnePlayer(array_column($this->map, $i), $type)) {
                return true;
            }
        }

        $diagonal1 = [$this->map[1][1], $this->map[2][2], $this->map[3][3]];
        if ($this->populatedByOnePlayer($diagonal1, $type)) {
            return true;
        }

        $diagonal2 = [$this->map[3][1], $this->map[2][2], $this->map[1][3]];
        if ($this->populatedByOnePlayer($diagonal2, $type)) {
            return true;
        }

        return false;
    }

    private function populatedByOnePlayer($row, $type)
    {
        foreach ($row as $value) {
            if ($value !== $type) {
                return false;
            }
        }
        return true;
    }
 */

namespace App;

use App\Easy;
use App\Normal;

class TicTacToe
{
    private object $game;
    private array $field;
    // BEGIN (write your solution here)
    public function __construct($level = 'easy')
    {
        $this->field = ['1' => [1 => '', 2 => '', 3 => ''],
                        '2' => [1 => '', 2 => '', 3 => ''],
                        '3' => [1 => '', 2 => '', 3 => '']];

        $this->game = $level === 'easy' ?  new Easy($this->field) : new Normal($this->field);
    }

    public function makeStep($line, $column, $sign)
    {
        return $this->field[$line][$column] = $sign;
    }

    public function isWinner($sign): bool
    {
        $diagonal1 = [$this->field['1']['1'], $this->field['2']['2'], $this->field['3']['3']];
        $diagonal2 = [$this->field['3']['1'], $this->field['2']['2'], $this->field['1']['3']];
        $column1 = array_column($this->field, '1');
        $column2 = array_column($this->field, '2');
        $column3 = array_column($this->field, '3');
        $winCombinations = [...$this->field, $diagonal1, $diagonal2, $column1, $column2, $column3];
        return array_reduce($winCombinations, function ($acc, $item) use ($sign) {
            $results[] =  array_reduce($item, fn ($ac, $it)=> $it === $sign ? $ac + 1 : $ac, 0);
            foreach ($results as $result) {
                if ($result === 3) {
                    $acc = true;
                    break;
                }
            }
            return $acc;
        }, false);
    }

    public function go($line = 0, $column = 0): bool
    {
        if ($line !== 0 && $column !== 0) {
            $this->makeStep($line, $column, 'X');
            return $this->isWinner('X');
        }
        $AiIndex = $this->game->calculate();
        $AiLine = $AiIndex['line'];
        $AiColumn = $AiIndex['column'];
        $this->makeStep($AiLine, $AiColumn, '0');
        return $this->isWinner('0');
    }
    // END
}
