<?php

declare(strict_types=1);

function makePhoneNumberFromArray(array $array): string
{
    $part1 = "+$array[0]";
    $part2 = "($array[1]$array[2]$array[3])";
    $part3 = "$array[4]$array[5]$array[6]-$array[7]$array[8]-$array[9]$array[10]";
    return "$part1 $part2 $part3";
}
