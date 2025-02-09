<?php
    class Cat{
        private $name;
        public $color;
        public $weight;    

        function __construct(string $name, string $color, int $weight){ // new переводит управление в __cinstruct
            $this->name = $name; 
            $this->color = $color;
            $this->weight = $weight;
        }
        function setName(string $name){ // присваивает значения приватным классам
            $this->name = $name;
        }
        function getName(){ // получает значения приватных классов
            return $this->name;
        }
    }

    $cat3 = new Cat('barsik','gray',5);
    // $cat2 = new Cat;
    // $cat1->setName("bublik");
    // $cat1->color = "blue";
    // $cat1->weight = 9;
    // $cat2->setName("manya");
    // echo $cat1->getName().'<BR>';
    // echo $cat2->getName().'<BR>';
    var_dump($cat3); // вывод он лучше чем ехо так как можно вводить и объекты в консоле