<?php

declare(strict_types=1);

function makePhoneNumberFromArray($numbers)
{
    if (count($numbers) === 11) {
        return "+$numbers[0] ($numbers[1]$numbers[2]$numbers[3]) $numbers[4]$numbers[5]$numbers[6]-$numbers[7]$numbers[8]-$numbers[9]$numbers[10]";
    } else {
        return "Wrong number";
    }
}
