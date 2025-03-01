<?php
// http://localhost/PHP_labs/php_laba_1/Project/lesson_1.php




    // class Cat{
    //     private $name;
    //     public $color;
    //     public $weight;    

    //     function __construct(string $name, string $color, int $weight){ // new переводит управление в __cinstruct
    //         $this->name = $name; 
    //         $this->color = $color;
    //         $this->weight = $weight;
    //     }
    //     function setName(string $name){ // присваивает значения приватным классам
    //         $this->name = $name;
    //     }
    //     function getName(){ // получает значения приватных классов
    //         return $this->name;
    //     }
    // }

    // $cat3 = new Cat('barsik','gray',5);
    // // $cat2 = new Cat;
    // // $cat1->setName("bublik");
    // // $cat1->color = "blue";
    // // $cat1->weight = 9;
    // // $cat2->setName("manya");
    // // echo $cat1->getName().'<BR>';
    // // echo $cat2->getName().'<BR>';
    // var_dump($cat3); // вывод он лучше чем ехо так как можно вводить и объекты в консоле









    // class Lesson
// {
//     protected $text;
//     protected $lesson;

//     function __construct(string $title, string $text) {
//         $this->title = $title;
//         $this->text = $text;
//     }

//     public function getText() {
//         return $this->text;
//     }
// }

// $lesson = new Lesson('lesson 1', 'lorum ipsum');

// class HomeWork extends Lesson
// {
//     protected $task;

//     function __construct(string $title, string $text, $task) {
//         parent: construct($title, $text);
//         $this->task = $task;
//     }
// }

// class LabWork extends HomeWork 
// {
//     private $count;
//     function __construct(string $title, string $text, $task, $count) {
//         parent: construct($title, $text, $task);
//         $this->count = $count;
//     }
// }



// $labwork = new LabWork('rt', 'rt', 4, 4);
// echo $labwork->getText();

// class Rectangle implements calculateSquare
// {
//     private $a;
//     private $b;
//     function __construct($a, $b) {
//         $this->a= $a;
//         $this->b= $b;
//     }

//     public function calculateSquare(): float
//     {
//         return $this->a * $this->b
//     }
// }\

// class Square implements calculateSquare
// {
//     private $a;
//     function __construct($a) {
//         $this->a= $a;
//     }

//     public function calculateSquare(): float
//     {
//         return $this->a * $this->a
//     }
// }

// class Circle implements calculateSquare
// {
//     private $r;
//     function __construct($r) {
//         $this->r= $r;
//     }
//     public function calculateSquare(): float
//     {
//         $pi = 3.14;
//         return $pi * ($this->r ** 2);
//     }
// }

// interface calculateSquare
// {
//     public function calculateSquare(): float;
// }

// $figures = [
//     $rectangle = new Rectangle(2, 4),
//     $square = new Square(4),
//     $circle = new Circle(6)
// ];

// foreach($figures as $figure) {
//     if($figure instanceof calculateSquare) {
//     echo $figure->calculateSquare().'<BR>';
//     }
//     else {
//         echo "Object don't implement interface."
//     }
// }

// class A {
//     public function sayHello() {
//         return "Hello. I'm A."
//     }
// }

// class B extends A 
// {
//     public function sayHello {
//         return parent::sayHello() . "It was a joke, I'm B :)"
//     }
// }

// $a = new A;
// var_dump($a instanceof A);

// echo '<BR>';
// $b = new B;
// var_dump($b instanceof A);

// echo '<BR>';
// echo $a->sayHello();
// echo '<BR>';
// echo $b->sayHello();

// class A 
// {
//     public function method1() {
//         return $this->method2();
//     }

//     protected function method2() {
//         return 'A';
//     }
// }

// class B extends A 
// {
//     protected function method2() {
//         return 'B';
//     }
// }

// $a = new A;
// $b = new B;

// echo $a -> method1();
// echo '<BR>';
// echo $b -> method1();








// protected чтобы свойство видел наследник (есть еще приватные private и публичные свойства public)
// parent(в дочернем классе для construct, но также можно использовать для любого другого метода) 

// interface, implements, instanceof

// try { // для отловки ошибки
    
// } catch(error){
    
// }
