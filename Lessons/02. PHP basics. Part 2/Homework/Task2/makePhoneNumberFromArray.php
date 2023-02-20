<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения
function makePhoneNumberFromArray($arguments): string
{
    return "+"."$arguments[0]" . " " ."("."$arguments[1]$arguments[2]$arguments[3]".")"." "."$arguments[4]$arguments[5]$arguments[6]"."-"."$arguments[7]$arguments[8]"."-"."$arguments[9]$arguments[10]";

}
// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
