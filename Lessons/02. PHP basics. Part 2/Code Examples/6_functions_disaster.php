<?php

declare(strict_types=1);

function makeDisaster($userName = '', $userSurname = '', $userPatronymic = '')
{
    return "$userName $userSurname $userPatronymic";
}

var_dump(makeDisaster('Name', 'Surname', 'Patronymic'));
var_dump(makeDisaster('Name', null, 'Patronymic'));
var_dump(makeDisaster('Name'));
var_dump(makeDisaster('Name', false));
var_dump(makeDisaster('Name', 0));
