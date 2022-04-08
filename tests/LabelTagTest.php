<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\LabelTag;
use App\InputTag;

class LabelTagTest extends TestCase
{
    public function testLabelTag()
    {
        $inputTag = new InputTag('submit', 'Save');
        $labelTag = new LabelTag('Press Submit', $inputTag);
        $actual = $labelTag->render();
        $expected = '<label>Press Submit<input type="submit" value="Save"></label>';
        $this->assertEquals($expected, $actual);
    }
}
