<?php

class MyClass
{
    public function MyFunc(?int $a, int &$b): ?int
    {
        return null;
    }
}

$a = new MyClass();
$b = 3;

echo PHP_VERSION ?? "";

json_decode("");