<?php

namespace App\Comparator;

/*
 * Реализуйте функцию compare($seq1, $seq2), которая сравнивает две строчки набранные в редакторе.
 * Если они равны то возвращает true, иначе - false.
 *  Особенность строчек в том они могут содержать символ #, соответствующий нажатию клавиши Backspace.
 * Она означает, что нужно стереть предыдущий символ: abd##a# превращается в a.

Примеры
<?php

// Перед самим сравнением, нужно вычислить реальную строчку отображенную в редакторе.
// 'ac' === 'ac'
compare('ab#c', 'ab#c'); // true

// '' === ''
compare('ab##', 'c#d#'); // true

// 'c' === 'b'
compare('a#c', 'b'); // false

// 'cd' === 'cd'
compare('#cd', 'cd'); // true
Подсказки
Поведение # соответствует тому как это происходит в реальной жизни. Если строчка пустая, то Backspace ничего не стирает.
В этой задаче понадобится стек.
Воспользуйтесь классом \Ds\Stack.
function compare($text1, $text2)
{
    $evaluatedText1 = evaluate($text1);
    $evaluatedText2 = evaluate($text2);

    return $evaluatedText1 === $evaluatedText2;
}

function evaluate($text)
{
    $stack = new \Ds\Stack();
    for ($i = 0, $length = mb_strlen($text); $i < $length; $i++) {
        $current = $text[$i];
        if ($current != '#') {
            $stack->push($current);
        } elseif (!$stack->isEmpty()) {
            $stack->pop();
        }
    }

    return $stack->toArray();
}
 */


function addElementToStack($string)
{
    $stack = new \Ds\Stack();
    for ($i = 0, $length = strlen($string); $i < $length; $i++) {
        $currentElement = $string[$i];
        if ($currentElement !== '#') {
            $stack->push($currentElement);
        } else {
            if (!$stack->isEmpty()) {
                $stack->pop();
            }
        }
    }
    return $stack;
}

function compare(string $string1, string $string2): bool
{
    $stack1 = addElementToStack($string1);
    $stack2 = addElementToStack($string2);
    $result1 = $stack1->toArray();
    $result2 = $stack2->toArray();
    $count1 = count($result1);
    $count2 = count($result2);
    if ($count1 !== $count2) {
        return false;
    } else {
        $result = array_map(fn($item1, $item2) => $item1 === $item2, array_values($result1), array_values($result2));
        return !in_array(false, $result);
    }
}
