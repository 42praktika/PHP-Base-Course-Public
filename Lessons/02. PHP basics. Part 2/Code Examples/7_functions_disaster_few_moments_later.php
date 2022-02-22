<?php

declare(strict_types=1);

function makeDisaster(...$arguments): array
{
    $userName = $arguments[0] ?? '';
    $userSurname = $arguments[1] ?? '';
    $userPatronymic = $arguments[2] ?? '';
    $isAdmin = (bool)($arguments[3] ?? false);
    //$createdDateTime = $arguments[4] ?? '';
    $birthDateTime = isset($arguments[5]) ? new DateTime($arguments[5]) : null;

    $userData = [];
    //дополнительная информация для администратора
    if ($isAdmin) {
        $userData['spyInfo'] = 'Переписка других пользователей, исходящий трафик для каких-то служб';
    }

    $userData['currentUserName'] = "$userName $userSurname $userPatronymic";

    if ($birthDateTime == (new DateTime())->setTime(0, 0)) {
        $userData['message'] = 'С др крч!';
    }

    return $userData;
}

var_dump(makeDisaster('Name', 'Surname', 'Patronymic', false, false, '2022-02-22 00:00:00'));
var_dump(makeDisaster('Name', null, 'Patronymic', false, false, '2022-02-22 11:23:00'));
var_dump(makeDisaster(...['Name', false, false, true]));
var_dump(makeDisaster('Name', false, true, true));
var_dump(makeDisaster('Name', 0, true, true, true));
var_dump(makeDisaster('', false, false, false, false));
