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

class Square extends Figure
{
    private float $a;

    public function __construct(string $color, float $a)
    {
        parent::__construct($color, 4);
        $this->a = $a;
    }

    public function getArea(): float
    {
        $this->area = $this->a * $this->a;
        return $this->area;
    }

    public function infoAbout(): string
    {
        return "Это класс квадрата. У него {$this->sidesCount} стороны.";
    }
}

class Triangle extends Figure
{
    private float $a;
    private float $b;
    private float $c;

    public function __construct(string $color, float $a, float $b, float $c)
    {
        parent::__construct($color, 3);
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getArea(): float
    {
        
        $p = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
        return $this->area;
    }

    public function infoAbout(): string
    {
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
}

$rect1 = new Rectangle("красный", 5, 10);
$rect2 = new Rectangle("синий", 3.5, 7.2);

$square1 = new Square("зелёный", 4);
$square2 = new Square("жёлтый", 6.5);

$tri1 = new Triangle("оранжевый", 3, 4, 5);
$tri2 = new Triangle("фиолетовый", 5, 6, 7);

$figures = [$rect1, $rect2, $square1, $square2, $tri1, $tri2];

echo "<h1>Лабораторная работа №15</h1>";
foreach ($figures as $fig) {
    echo "<p><strong>{$fig->infoAbout()}</strong><br>";
    echo "Цвет: {$fig->getColor()}<br>";
    echo "Площадь: " . number_format($fig->getArea(), 2) . " кв. ед.</p>";
}

?>
