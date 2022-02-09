<?php

/*
 * Частой задачей при работе с деревьями (особенно HTML), является необходимость выбрать список узлов по определенному критерию.

Пара примеров из реальной жизни:

XPath

/bookstore/book/price[text()]
price/@exchange/total
book[excerpt]/author[degree]
JQuery

$("ul > li:first-child")
$("p.class1, #p1")
src/Solution.php
Реализуйте функцию select(), которая возвращает список нод в соответствии с запросом. Запрос это список из имен тегов, в котором каждый следующий тег это тег, вложенный в предыдущий. Порядок, в котором ноды возвращаются - не важен.

Примеры
У нас есть такой HTML:

<h1>scheme</h1>
<p>is a lisp</p>
<p>
  <ul>
    <li>item 2</li>
    <li>item 1</li>
  </ul>
</p>
<ol>
  <li>item 2</li>
  <li>item 1</li>
</ol>
<p>is a functional language</p>
<ul>
  <li>item</li>
</ul>
<div>
  <p>another text</p>
</div>
<div>
  <div>
    <p>
      <span>text</span>
    </p>
  </div>
</div>
<div>
  <a>
    <div>
      <p>
        <span>text</span>
      </p>
    </div>
  </a>
</div>
<h1>prolog</h1>
<p>is about logic</p>
Строим HTML следующим образом:

<?php
use function Php\Pairs\Data\Lists\l;
use function Php\Html\Tags\HtmlTags\make;
use function Php\Html\Tags\HtmlTags\append;
use function Php\Html\Tags\HtmlTags\node;

$dom1 = make();
$dom2 = append($dom1, node('h1', 'scheme'));
$dom3 = append($dom2, node('p', 'is a lisp'));
$children1 = l(node('li', 'item 1'), node('li', 'item 2'));
$dom4 = append($dom3, node('p', l(node('ul', $children1))));
$children2 = l(node('li', 'item 1'), node('li', 'item 2'));
$dom5 = append($dom4, node('ol', $children2));
$dom6 = append($dom5, node('p', 'is a functional language'));
$children3 = l(node('li', 'item'));
$dom7 = append($dom6, node('ul', $children3));
$dom8 = append($dom7, node('div', l(node('p', 'another text'))));
$dom9 = append($dom8, node('div', l(node('div', l(node('p', l(node('span', 'text'))))))));
$dom10 = append($dom9, node('div', l(node('a', l(node('div', l(node('p', l(node('span', 'text'))))))))));
$dom11 = append($dom10, node('h1', 'prolog'));
$dom = append($dom11, node('p', 'is about logic'));
Пример работы функции, где для наглядности показано какой она будет возвращать результат если выводить его на экран (htmlToString()):

<?php

select(l('p', 'ul', 'li'), $dom);
// <li>item 1</li><li>item 2</li>

select(l('div', 'div', 'p'), $dom);
// <p><span>text</span></p>

select(l('div', 'p'), $dom);
// <p>another text</p><p><span>text</span></p><p><span>text</span></p>

select(l('div'), $dom));
// <div><a><div><p><span>text</span></p></div></a></div><div><p><span>text</span></p></div><div><div><p><span>text</span></p></div></div><div><p><span>text</span></p></div><div><p>another text</p></div>
Алгоритм
Список тегов для поиска будем называть словом query.
query ищется с любого уровня дерева, а не только с верхнего. Например, если наш query это p, то будут найдены все p на всех уровнях.
Производится поиск только подряд идущих тегов, например, если запрос l('ul', 'li'), то будут найдены только те li, которые идут сразу за ul.
Подсказки
hasChildren() - функция, которая проверяет, есть ли потомки у элемента
children() - функция, которая возвращает список потомков
P.S. В целом, эта функция достаточно сложна и, если вы сможете решить эту задачу самостоятельно, то вас смело можно брать на работу).
 */
namespace App\Solution;

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\toString as listToString;
use function Php\Pairs\Data\Lists\concat;
use function Php\Html\Tags\HtmlTags\is;
use function Php\Html\Tags\HtmlTags\toString as htmlToString;
use function Php\Html\Tags\HtmlTags\hasChildren;
use function Php\Html\Tags\HtmlTags\children;
use function Php\Html\Tags\HtmlTags\reduce;
use function Php\Html\Tags\HtmlTags\filter;
use function Php\Html\Tags\HtmlTags\map;

// BEGIN (write your solution here)

function select($query, $tree)
{
    return reduce($tree, function ($element, $acc) use ($query) {

        $queryTree = reduce($query, fn ($element, $acc) => concat($acc, l($element)), l());
        $headQuery = head($queryTree);
        $tailQuery = tail($queryTree);
        $queryForNewIteration = listToString($tailQuery);
        if (is($headQuery, $element)) {
            $acc = concat($acc, l($element));
        } elseif (hasChildren($element)) {
            if (!isEmpty($tailQuery)) {
                $acc = concat($acc, select($queryForNewIteration, children($element)));
            }
        }
        return $acc;
    }, l());
}
// END
