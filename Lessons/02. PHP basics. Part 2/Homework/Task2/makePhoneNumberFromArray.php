<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения
function makePhoneNumberFromArray(array $input){
    if(count($input) != 11)
        throw new Exception("Incorrect array length");
    $number = implode($input);

    preg_match( pattern: '/(\d{1})(\d{3})(\d{3})(\d{2})(\d{2})$/', subject: $number, matches: $matches );

    $result = "+$matches[1] ($matches[2]) $matches[3]-$matches[4]-$matches[5]";
    return $result;
}
// Раскомментируй для отладки
//var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
