<?php

declare(strict_types=1);

//определи функцию и пропиши типы аргументов функции и возвращаемого значения

function makePhoneNumberFromArray($numbers)
{
    $phone_number = '+';
    $count = 0;
    for($i = 0; $i < 17; $i++){
//        echo $phone_number."\n";
//        echo $i."\n";
//        echo $count."\n";
        if ($i == 1 or $i == 7)
            $phone_number = $phone_number." ";
        else if ($i == 2)
            $phone_number = $phone_number."(";
        else if ($i == 6)
            $phone_number = $phone_number.")";
        else if ($i == 11 or $i == 14)
            $phone_number = $phone_number."-";
        else
        {
            $phone_number = $phone_number.$numbers[$count];
            $count += 1;
        }
    }

    return $phone_number;

}
// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
