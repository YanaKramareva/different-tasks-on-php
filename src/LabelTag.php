<?php

/*
 * В задании описан интерфейс Tag. Каждый класс, реализующий этот интерфейс,
 *  представляет из себя тег HTML. Метод render(), позволяет получить текстовое представление тега:

<?php

$tag = new InputTag('submit', 'Save');
$tag->render(); // <input type="submit" value="Save">
Предположим, что эта система нужна для генерации разных кусков верстки, которая может быть очень разнообразной.
 Попробуйте ответить на вопрос, сколько понадобится классов для представления всех возможных комбинаций тегов?

Если создавать по классу на каждый возможный вариант верстки,
то классов будет бесконечно много и смысла в такой реализации очень мало.
Но вместо этого лучше использовать композицию. Создать класс для каждого индивидуального тега
(в html5 их около 100 штук), а затем путем комбинирования получить все возможные варианты верстки.

src/LabelTag.php
Реализуйте класс LabelTag, который реализует интерфейс Tag и умеет оборачивать другие теги:

<?php

$inputTag = new InputTag('submit', 'Save');
$labelTag = new LabelTag('Press Submit', $inputTag);
$labelTag->render();
// <label>
//   Press Submit
//   <input type="submit" value="Save">
// </label>
Подсказки
Паттерн Декоратор
class LabelTag implements Tag
{
    private $text;
    private $child;

    public function __construct(string $text, Tag $child)
    {
        $this->text = $text;
        $this->child = $child;
    }

    public function render()
    {
        return "<label>{$this->text}{$this->child}</label>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
 */
namespace App;

class LabelTag implements Tag
{
    private $type;
    private object $object;

    public function __construct(string $type, $object)
    {
        $this->type = $type;
        $this->object = $object;
    }

    public function render()
    {
        $string = $this->object->__toString();
        return "<label>$this->type$string</label>";
    }

    public function __toString()
    {
        return $this->render();
    }
}



// BEGIN (write your solution here)

// END
