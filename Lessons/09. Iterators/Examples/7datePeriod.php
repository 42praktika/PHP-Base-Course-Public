<?php

declare(strict_types=1);

$start = new DateTime('first day of this month');
$end = new DateTime('first day of next month');
$step = new DateInterval('P1D');
$datePeriod = new DatePeriod($start, $step, $end);
echo str_repeat("   ", (int)$start->format("w")); // Месяц начинается не всегда с понедельника - добавляем по 3 пробела на каждый день недели до 1 числа
foreach ($datePeriod as $date ) {
    echo $date->format("d"), " ";
    if ($date->format("w")==="6") {
        echo PHP_EOL;
    }
}

