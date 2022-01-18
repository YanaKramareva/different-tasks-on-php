<?php
function factorialRecursive($num)
{
    // BEGIN (write your solution here)
    if ($num === 0) {
        return 1;
    }
    return $num * factorial($num-1);
    // END
}