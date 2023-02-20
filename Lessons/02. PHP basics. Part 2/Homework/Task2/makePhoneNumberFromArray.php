<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения

// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));


function makePhoneNumberFromArray($phone):string
{
    if (count ($phone) == 11){
    return '+' . $phone[0] . ' (' . $phone[1] . $phone[2] . $phone[3] . ') ' . $phone[4] . $phone[5] .
        $phone[6] . '-' . $phone[7] . $phone[8] . '-' . $phone[9] . $phone[10];}
    else{ return "error";}
}