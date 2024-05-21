<?php

declare(strict_types=1);
class MyClass {
    public int $publicInt;
    private int $privateint;
    public string $publicString;

    private string $privateString;

public function __construct()
{
    $this->publicInt = 1;
    $this->privateint = 0;
    $this->publicString = "I am Public";
    $this->privateString = "I am Private";
}

}

$myobj = new MyClass();
foreach ($myobj as $key=>$value) {
    echo $key, "=>", $value, PHP_EOL;
}
