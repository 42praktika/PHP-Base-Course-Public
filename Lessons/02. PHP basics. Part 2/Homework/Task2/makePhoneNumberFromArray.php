<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения
function makePhoneNumberFromArray(array $numbers) : string {

    $prefix = "+$numbers[0]";
    $zoneCode = "($numbers[1]$numbers[2]$numbers[3])";
    $clientNumber = "$numbers[4]$numbers[5]$numbers[6]-$numbers[7]$numbers[8]-$numbers[9]$numbers[10]";

    return "$prefix $zoneCode $clientNumber";
}

// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
