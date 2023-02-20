<?php

declare(strict_types=1);

function makePhoneNumberFromArray($arrayOfNumbers): string
{
    $result = " ";
    for ($i = 0; $i < 11; $i++) {
        $result1 = "+$arrayOfNumbers[0]".' ';
        $result2 = "($arrayOfNumbers[1]$arrayOfNumbers[2]$arrayOfNumbers[3])".' ';
        $result3 = "$arrayOfNumbers[4]$arrayOfNumbers[5]$arrayOfNumbers[6]".'-';
        $result4 = "$arrayOfNumbers[7]$arrayOfNumbers[8]".'-';
        $result5 = "$arrayOfNumbers[9]$arrayOfNumbers[10]";
        $result = "$result1$result2$result3$result4$result5";
    }
    return $result;
}

// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
