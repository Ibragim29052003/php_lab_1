<?php
// http://localhost/PHP_labs/php_laba_1/3/Lab_1.1/abstractClasses.php


abstract class HumanAbstract
{
    private $name;

    // Конструктор класса, принимает имя человека при создании объекта
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        // Возвращаем имя человека
        return $this->name;
    }

    abstract public function getGreetings(): string;

    abstract public function getMyNameIs(): string;

    // объединяет приветствие, фразу "Меня зовут" и имя
    public function introduceYourself(): string
    {
        
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class RussianHuman extends HumanAbstract
{
    // Реализация абстрактного метода для получения приветствия на русском языке
    public function getGreetings(): string
    {
        return 'Привет';
    }

    // Реализация абстрактного метода для получения фразы "Меня зовут" на русском языке
    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

class EnglishHuman extends HumanAbstract
{
    // Реализация абстрактного метода для получения приветствия на английском языке
    public function getGreetings(): string
    {
        // Возвращаем приветствие "Hello"
        return 'Hello';
    }

    // Реализация абстрактного метода для получения фразы "Меня зовут" на английском языке
    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

// Создание объектов
$russianHuman = new RussianHuman('Иван'); // Создаем русского человека с именем Иван
$englishHuman = new EnglishHuman('John');   // Создаем английского человека с именем John

// Заставляем их поздороваться и представиться
echo $russianHuman->introduceYourself() . '<br>'; // Привет! Меня зовут Иван.
echo $englishHuman->introduceYourself() . '<br>'; // Hello! My name is John.

?>

