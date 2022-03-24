<?php

/*
 * Реализуйте функцию hammingWeight(), которая считает вес Хэмминга.

<?php

hammingWeight(0);   // 0
hammingWeight(4);   // 1
hammingWeight(101); // 4

 */
namespace App\Solution;

function hammingWeight(int $number)
{
    $binnumber = decbin($number);
    return substr_count($binnumber, '1');
}
