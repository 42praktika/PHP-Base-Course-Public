<?php

declare(strict_types=1);

/**
 * Выполняет действие над каждым элементом массива и возвращает результат
 * @param $arr
 * @param $callback
 * @return Generator
 */
function collect($arr, $callback)
{
    foreach ($arr as $v) yield $callback($v);
}

/**
 * Фильтрует массив и возвращает только подходящие значения
 * @param $arr
 * @param $callback
 * @return Generator
 */
function select($arr, $callback)
{
    foreach ($arr as $v)
        if ($callback($v)) yield $v;
}

$arr = [1, 2, 3, 4, 5, 6];
echo "Квадраты элементов массива: ";
$collect = collect($arr, function($e){return $e * $e; });
foreach($collect as $val) echo "$val ";
echo PHP_EOL;

echo "Чётные элементы массива: ";
$select = select($arr, function($e){return $e % 2 == 0; });
foreach($select as $val) echo "$val ";
echo PHP_EOL;

echo "Квадраты чётных элементов массива: ";
$select = select($arr, function($e){return $e % 2 == 0; });
$combined = collect($select, function($e) {return $e * $e; });
foreach($combined as $val) echo "$val ";
