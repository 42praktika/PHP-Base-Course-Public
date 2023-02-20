<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения
function makePhoneNumberFromArray($arrayOfNumbers = array()): string {
    if(count($arrayOfNumbers) != 11){
        return "Передано недостаточно цифр";
    } else {
        return "+"."$arrayOfNumbers[0] ($arrayOfNumbers[1]$arrayOfNumbers[2]$arrayOfNumbers[3]) $arrayOfNumbers[4]$arrayOfNumbers[5]$arrayOfNumbers[6]-$arrayOfNumbers[7]$arrayOfNumbers[8]-$arrayOfNumbers[9]$arrayOfNumbers[10]";
    }
}
// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
