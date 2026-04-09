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

class Rectangle extends Figure
{
    private float $a;
    private float $b;

    public function __construct(string $color, float $a, float $b)
    {
        parent::__construct($color, 4);
        $this->a = $a;
        $this->b = $b;
    }

    public function getArea(): float
    {
        $this->area = $this->a * $this->b;
        return $this->area;
    }

    public function infoAbout(): string
    {
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны.";
    }
}



?>
