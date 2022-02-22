<?php

declare(strict_types=1);

//Fatal error, т.к. Функция определена внутри условия
getUserName();

$userExists = true;
if ($userExists) {
    function getUserName()
    {
        echo 'User Name';
    }
}
