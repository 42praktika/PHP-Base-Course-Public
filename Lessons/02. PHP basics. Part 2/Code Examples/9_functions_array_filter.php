<?php

declare(strict_types=1);

$userList = [
    [
        'name' => 'Иванов И.И.',
        'age' => 17,
    ],
    [
        'name' => 'Смирнов И.И.',
        'age' => 30,
    ],
    [
        'name' => 'Троекурова И.И.',
        'age' => 16,
    ],
    [
        'name' => 'Ахметзянова И.И.',
        'age' => 50,
    ],
];

var_dump(
    array_filter(
        $userList,
        static function ($user) {
            return $user['age'] < 30;
        }
    )
);

$functionInVariable = static function ($userList) {
    return array_filter(
        $userList,
        static fn($user) => $user['age'] > 30,
    );
};

var_dump($functionInVariable($userList));
