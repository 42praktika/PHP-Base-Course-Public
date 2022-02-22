<?php

declare(strict_types=1);

function makeDisaster(): array
{
    return [];
}

var_dump(makeDisaster('Name', 'Surname', 'Patronymic', false, false, '2022-02-22 00:00:00'));
var_dump(makeDisaster('Name', null, 'Patronymic', false, false, '2022-02-22 11:23:00'));
var_dump(makeDisaster(...['Name', false, false, true]));
var_dump(makeDisaster('Name', false, true, true));
var_dump(makeDisaster('Name', 0, true, true, true));
var_dump(makeDisaster('', false, false, false, false));
