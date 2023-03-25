<?php
namespace Classes;

final class ComplexNumber
{
    const CLASS_NAME="ComplexNumber";
    private int $im, $re;
    private array $args=[];
    public ComplexNumber $cn1;

    function add(ComplexNumber $cn1): void
    {
        $this->cn1 = clone $this;
        $this->im += $cn1->im;
        $this->re += $cn1->re;

    }

    public function __toString(): string
    {

        return sprintf("%s: %s%s%s", self::CLASS_NAME,
            $this->re != 0 ? "$this->re" : "",
            $this->im > 0 ? "+" : "",
            $this->im != 0 ? "{$this->im}i" : "");

    }

    public function __construct(int $re=0, int $im=0)
    {
        $this->re = $re;
        $this->im = $im;

    }

    public function __destruct()
    {
        $this->re=0;
    }

    /**
     * @return int
     */
    public function getIm(): int
    {
        return $this->im;
    }

    /**
     * @return int
     */
    public function getRe(): int
    {
        return $this->re;
    }

    public function __set(string $name, $value): void
    {
        $this->args[$name] = $value;
    }

    public function __get(string $name)
    {
        return $this->args[$name];
    }

    public function __call(string $name, array $arguments)
    {
        return;
    }

    public function __clone(): void
    {
        if (!isset($this->cn1)) return;
        $this->cn1 = clone $this->cn1;
    }

    public function __sleep(): array
    {
        return  ['re', 'im' ];
    }

    public function __wakeup(): void
    {
        $this->cn1 = new ComplexNumber();
    }

}