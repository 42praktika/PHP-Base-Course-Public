<?php

declare(strict_types=1);

function makePhoneNumberFromArray($arguments): string
{
    return "+$arguments[0] ($arguments[1]$arguments[2]$arguments[3]) $arguments[4]$arguments[5]$arguments[6]-$arguments[7]$arguments[8]-$arguments[9]$arguments[10]";
}