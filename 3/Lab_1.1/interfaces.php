<?php
// http://localhost/PHP_labs/php_laba_1/3/Lab_1.1/interfaces.php


// Интерфейс для вычисления площади
interface calculateSquare
{
    // Метод для вычисления площади, должен возвращать значение типа float
    public function calculateSquare(): float;
}

// Класс для представления прямоугольника, реализует интерфейс calculateSquare
// implements говорит классу как реализовать интерфейс (предоставить реализации методов).
class Rectangle implements calculateSquare
{
    // Приватные свойства для хранения сторон прямоугольника
    private $a;
    private $b;

    function __construct($a, $b) {
        $this->a= $a;
        $this->b= $b;
    }

    // Метод для вычисления площади прямоугольника
    public function calculateSquare(): float
    {
        return $this->a * $this->b;
    }
}


// Класс для представления квадрата, реализует интерфейс calculateSquare
class Square implements calculateSquare
{
    // Приватное свойство для хранения стороны квадрата
    private $a;

    function __construct($a) {
        $this->a= $a;
    }

    // Метод для вычисления площади квадрата
    public function calculateSquare(): float
    {
        return $this->a * $this->a;
    }
}

// Класс для представления круга, реализует интерфейс calculateSquare
class Circle implements calculateSquare
{
    // Приватное свойство для хранения радиуса круга
    private $r;

    function __construct($r) {
        $this->r= $r;
    }

    // Метод для вычисления площади круга
    public function calculateSquare(): float
    {
        // Константа Pi
        $pi = 3.14;
        return $pi * ($this->r ** 2);
    }
}

// Класс для представления треугольника, НЕ реализует интерфейс calculateSquare
class Triangle
{
    // Приватные свойства для хранения основания и высоты треугольника
    private $base;
    private $height;

    // Конструктор класса, принимает значения основания и высоты
    public function __construct($base, $height)
    {
        $this->base = $base;
        $this->height = $height;
    }
}


// Массив с объектами разных классов
$figures = [
    $rectangle = new Rectangle(2, 4), // Объект класса Rectangle
    $square = new Square(4),       // Объект класса Square
    $circle = new Circle(6),       // Объект класса Circle
    $triangle = new Triangle(5, 8)  // Объект класса Triangle, не реализует calculateSquare
];

// Перебираем массив объектов
foreach($figures as $figure) {
    // Проверяем, реализует ли текущий объект интерфейс calculateSquare
    if($figure instanceof calculateSquare) {
        // Если реализует, то выводим название класса и вычисленную площадь
        echo "Площадь объекта класса " . get_class($figure) . ": " . $figure->calculateSquare() . "<br>";
    }
    else {
        // Если не реализует, то выводим сообщение об этом, указывая название класса
        echo "Объект класса " . get_class($figure) . " не реализует интерфейс CalculateSquare.<br>";
    }
}

// вывод

// Площадь объекта класса Rectangle: 8
// Площадь объекта класса Square: 16
// Площадь объекта класса Circle: 113.04
// Объект класса Triangle не реализует интерфейс CalculateSquare.

?>

