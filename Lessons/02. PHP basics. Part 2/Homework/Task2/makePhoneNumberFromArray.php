<?php

declare(strict_types=1);

function makePhoneNumberFromArray(array $numbers) : string {
    return "+".$numbers[0]." (".$numbers[1].$numbers[2].$numbers[3].")".(" ").$numbers[4].$numbers[5].$numbers[6].("-").$numbers[7].$numbers[8].("-").$numbers[9].$numbers[10];
}

var_dump(makePhoneNumberFromArray(['7', '9', '1', '7', '2', '3', '2', '8','7', '9', '8']));
