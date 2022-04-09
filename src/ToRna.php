<?php

/*
 * ДНК и РНК это последовательности нуклеотидов.

Четыре нуклеотида в ДНК это аденин (A), цитозин (C), гуанин (G) и тимин (T).

Четыре нуклеотида в РНК это аденин (A), цитозин (C), гуанин (G) и урацил (U).

Цепь РНК составляется на основе цепи ДНК последовательной заменой каждого нуклеотида:

G -> C
C -> G
T -> A
A -> U
src/Solution.php
Напишите функцию toRna, которая принимает на вход цепь ДНК и возвращает соответствующую цепь РНК
(совершает транскрипцию РНК).


toRna('ACGTGGTCTTAA');
// → 'UGCACCAGAAUU'

 */
namespace App\Solution;

function toRna(string $dna)
{
    $connection = ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U'];
    $dnaArray = str_split($dna);
    $rnaArray = array_map(fn($item)=>$connection[$item], $dnaArray);
    return implode('', $rnaArray);
}
