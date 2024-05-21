<?php

declare(strict_types=1);
class MyClass  implements Iterator {
    public int $publicInt;
    private int $privateint;
    public string $publicString;

    private string $privateString;

    private int $index;

public function __construct()
{
    $this->publicInt = 1;
    $this->privateint = 0;
    $this->publicString = "I am Public";
    $this->privateString = "I am Private";
    $index = 0;
}


    public function current(): ?string
    {
        return match ($this->index) {
            0 => $this->publicString,
            1 => $this->privateString,
            default => null
        };
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return $this->index>=0 && $this->index<=1;
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}

$myobj = new MyClass();
foreach ($myobj as $key=>$value) {
    echo $key, "=>", $value, PHP_EOL;
}
