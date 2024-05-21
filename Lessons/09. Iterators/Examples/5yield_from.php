<?php

declare(strict_types=1);

function square($value): Generator
{
    yield $value * $value;
}

function even_square($arr): Generator
{
    foreach ($arr as $value) {
        if ($value % 2 == 0) yield from square($value);
    }
}

$arr = [1,2,3,4,5,6];
foreach (even_square($arr) as $val) echo "$val ";
