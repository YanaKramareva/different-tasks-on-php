<?php

/*
 * В данном упражнении необходимо реализовать стековую машину, то есть алгоритм,
 * проводящий вычисления по обратной польской записи.

Обратная польская нотация или постфиксная нотация — форма записи математических и логических выражений,
 в которой операнды расположены перед знаками операций.
Выражение читается слева направо.
Когда в выражении встречается знак операции, выполняется соответствующая операция над
двумя ближайшими операндами,
находящимися слева от знака операции.
Результат операции заменяет в выражении последовательность её операндов и знак,
после чего выражение вычисляется дальше по тому же правилу.
Таким образом, результатом вычисления всего выражения становится результат последней
вычисленной операции.

Например, выражение (1 + 2) * 4 + 3 в постфиксной нотации будет выглядеть так: 1 2 + 4 * 3 +,
а результат вычисления: 15. Другой пример - выражение: 7 - 2 * 3, в постфиксной нотации: 7 2 3 * -,
 результат: 1.

src\Arrays.php
Реализуйте функцию calcInPolishNotation,
которая принимает массив, каждый элемент которого содержит число или знак операции (+, -, *, /).
 Функция должна вернуть результат вычисления по обратной польской записи.
Если в какой-то момент происходит деление на ноль, функция должна вернуть значение null.

<?php

calcInPolishNotation([1, 2, '+', 4, '*', 3, '+']);
// → 15

calcInPolishNotation([7, 2, 3, '*', '-']);
// → 1

function calcInPolishNotation(array $array)
{
    $stack = [];
    $operators = ['*', '/', '+', '-'];
    foreach ($array as $value) {
        if (!in_array($value, $operators)) {
            array_push($stack, $value);
            continue;
        }

        $b = array_pop($stack);
        $a = array_pop($stack);
        switch ($value) {
            case '*':
                $result = $a * $b;
                break;
            case '/':
                $result = $b === 0 ? null : $a / $b;
                break;
            case '+':
                $result = $a + $b;
                break;
            case '-':
                $result = $a - $b;
                break;
        }

        if ($result === null) {
            return $result;
        }

        array_push($stack, $result);
    }

    return array_pop($stack);
}
 */
namespace App\Arrays;

function calcInPolishNotation(array $array): int
{
    $result =  array_reduce($array, function ($stack, $item) {
        switch ($item) {
            case is_numeric($item):
                array_push($stack, $item);
                break;
            case is_null($item):
                array_push($stack, $item);
                break;
            case !is_numeric($item):
                var_dump($stack);
                $second = array_pop($stack);
                $first = array_pop($stack);
                if ($item === '+') {
                    $result = $first + $second;
                    array_push($stack, $result);
                }
                if ($item === '-') {
                    $result = $first - $second;
                    array_push($stack, $result);
                }
                if ($item === '*') {
                    $result = $first * $second;
                    array_push($stack, $result);
                }
                if ($item === '/') {
                    if ($first !== 0 && $second !== 0) {
                        $result =  ($first / $second);
                        array_push($stack, $result);
                    }
                }
                break;
        }
        return $stack;
    }, []);
    return array_sum($result);
}
