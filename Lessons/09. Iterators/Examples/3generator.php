<?php

declare(strict_types=1);
function GenerateOdds(): iterable
{
    yield 1;
    yield 3;
    yield 5;
    yield 7;
    yield 9;
    return 4;
}

$gen = GenerateOdds();
echo get_class($gen), PHP_EOL;
foreach ($gen as $num) {
    echo $num, " ";
}
echo PHP_EOL;

echo 'Number of elements: ', $gen->getReturn();
