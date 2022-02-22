<?php

declare(strict_types=1);

function getMyArguments(int $first, string $second = 'test', bool $third = false): array
{
    return [
        'first' => $first,
        'second' => $second,
        'third' => $third,
    ];
}

var_dump(getMyArguments(first: 9, third: true));
