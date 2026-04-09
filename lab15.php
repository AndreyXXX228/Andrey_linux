<?php
interface AreaCalculable
{
    public function getArea(): float;
}

abstract class Figure implements AreaCalculable
{
    protected string $color;
    protected int $sidesCount;
    protected float $area;

    public function __construct(string $color, int $sidesCount)
    {
        $this->color = $color;
        $this->sidesCount = $sidesCount;
        $this->area = 0.0;
    }

    abstract public function infoAbout(): string;

    public function getColor(): string
    {
        return $this->color;
    }

    public function getSidesCount(): int
    {
        return $this->sidesCount;
    }
}


?>
