<?php

namespace App;

/*
 * Реализуйте класс HTMLDivElement, который описывает собой парный тег <div>.

<?php

$div = new HTMLDivElement(['name' => 'div', 'data-toggle' => 'true']);
$div->setTextContent('Body');
echo $div; // '<div name="div" data-toggle="true">Body</div>'

class HTMLDivElement extends HTMLPairElement
{
    public function getTagName()
    {
        return 'div';
    }
}
 */

// BEGIN (write your solution here)
class HTMLDivElement extends HTMLPairElement
{
    public function getTagName()
    {
        return $this->tagname = 'div';
    }
}
// END
