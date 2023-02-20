<?php

declare(strict_types=1);

function makePhoneNumberFromArray($array) {
    $answer = "";
    $flag = false;

    for ($i = 0; $i <= 17; $i++) {
        if ($i == 0) {
            $answer .= "+";
            $iter = 0;
        } elseif ($i == 2 && !$flag) {
            $answer .= " ";
            $flag = true;
        } elseif ($i == 8 && $flag) {
            $answer .= " ";
            $flag = true;
        } elseif ($i == 3 && $flag) {
            $answer .= "(";
            $flag = true;
        } elseif ($i == 7 && !$flag) {
            $answer .= ")";
            $flag = true;
        } elseif (($i == 12 || $i == 15) && !$flag) {
            $answer .= "-";
            $flag = true;
        } else {
            $answer .= $array[$iter];
            $flag = false;
            if ($iter != 10) {
                $iter++;
            }
        }
    }
    return $answer;
}
//определи функцию и пропиши типы аргументов функции и возвращаемого значения

// Раскомментируй для отладки
var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8', '7', '9', '8']));
