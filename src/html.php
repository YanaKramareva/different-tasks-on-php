<?php

namespace App\html;

function save($tag, $filename)
{
    $html = $tag->render();
    file_put_contents($filename, $html);
}
