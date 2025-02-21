<?php
// http://localhost/PHP_labs/php_laba_1/3/Lab_1.1/inheritance.php


class Lesson
{
    // Защищенные свойства: доступны внутри класса и его подклассов.
    protected $title;  // Название урока
    protected $text;   // Текстовое содержимое урока

    function __construct(string $title, string $text) {
        $this->title = $title;
        $this->text = $text;
    }

    // Метод получения текста урока.
    public function getText(): string {
        return $this->text;
    }

    // Метод получения названия урока.
    public function getTitle(): string {
        return $this->title;
    }
}

$lesson = new Lesson('lesson 1', 'lorum ipsum');

class HomeWork extends Lesson
{
    protected $task; 

    function __construct(string $title, string $text, $task) {
        // Вызываем конструктор родительского класса (Lesson) для инициализации названия и текста.
        parent::__construct($title, $text);
        $this->task = $task;
    }
}

class LabWork extends HomeWork 
{
    private $count; // Количество итераций лабораторной работы

    function __construct(string $title, string $text, $task, $count) {

        parent::__construct($title, $text, $task);
        $this->count = $count;
    }
}

$labwork = new LabWork('rt', 'rt', 4, 4);
echo $labwork->getText(); // Выводим текст содержимого



// Класс PaidLesson (Платный урок)
class PaidLesson extends Lesson {
    private $price; // Цена платного урока

   
    function __construct(string $title, string $text, float $price) {


        parent::__construct($title, $text);
        $this->price = $price;
    }

    // Метод получения цены.
    public function getPrice(): float {
        return $this->price;
    }

    // Метод установки цены. 
    public function setPrice(float $price): void {
        $this->price = $price;
    }
}

// Класс HomeWork2 (Вторая Домашняя работа), наследуется от PaidLesson, чтобы добавить задание.
class HomeWork2 extends PaidLesson
{
    protected $task;

    function __construct(string $title, string $text, float $price, $task) {

        parent::__construct($title, $text, $price);
        $this->task = $task;
    }
}


$homeWork2 = new HomeWork2(
    'Урок о наследовании в PHP',
    'Лол, кек, чебурек',
    99.90,
    'Ложитесь спать, утро вечера мудренее'
);

var_dump($homeWork2); // object(HomeWork2)#3 (4) { ["title":protected]=> string(43) "Урок о наследовании в PHP" ["text":protected]=> string(30) "Лол, кек, чебурек" ["price":"PaidLesson":private]=> float(99.900000000000005684341886080801486968994140625) ["task":protected]=> string(67) "Ложитесь спать, утро вечера мудренее" }

?>

