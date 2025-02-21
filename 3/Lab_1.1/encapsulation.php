<?php
// http://localhost/PHP_labs/php_laba_1/3/Lab_1.1/encapsulation.php

class Cat {
    private $name; 
    private $color; 
    public $weight; 

    function __construct(string $name, string $color, int $weight) {
        // Этот метод вызывается, когда создается новый объект Cat 
        $this->name = $name;   
        $this->color = $color; 
        $this->weight = $weight; 
    }

    function setName(string $name) {
        // Этот метод позволяет изменить имя кота
        $this->name = $name;
    }

    function getName() {
        // Этот метод возвращает имя кота
        return $this->name;
    }

    function getColor() {
        // Этот метод возвращает цвет кота
        return $this->color;
    }

    function sayHello() {
        // Этот метод возвращает приветствие кота, включая его имя и цвет
        return "Мяу, меня зовут " . $this->getName() . " и я " . $this->getColor() . " цвета.";
    }
}

// Создаем нового кота с именем "Барсик", цветом "серый" и весом 5
$cat3 = new Cat('Барсик', 'серый', 5);

// Выводим приветствие кота
echo $cat3->sayHello(); 

// Пример, как раньше можно было менять цвет (теперь нельзя, т.к. свойство private)
// $cat1->color = "blue"; // БОЛЬШЕ НЕ РАБОТАЕТ, так как color - private

// Чтобы получить цвет, используем метод getColor()
$color = $cat3->getColor(); // $color теперь содержит "серый"
echo "Цвет кота: " . $color; // "Цвет кота: серый"

?>

