<?php

declare(strict_types=1);

function crange(int $start, int $end, int $step=1)
{
    if ($step == 0 || ($end-$start)/$step<0) return;
    for ($i=$start; $i<=$end; $i+=$step) { yield $i; }
}

$mem0 = memory_get_usage();
$end = 1000000;
$range = range(1, $end, 3);
foreach ($range as $val) {
    //echo $val, " ";
}
$mem1 = memory_get_usage();
$crange = crange(1, $end, 3);
foreach ($crange as $val) {
    //echo $val, " ";
}
$mem2 = memory_get_usage();

echo $mem1-$mem0, " ", $mem2-$mem1;