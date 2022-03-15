<?php

declare(strict_types=1);

$someGlobalVar = 2;

function testLocal()
{
    $someLocalVar = 9;
}

echo '<pre>';
var_dump($GLOBALS);
