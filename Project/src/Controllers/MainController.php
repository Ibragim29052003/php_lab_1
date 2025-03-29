<?php

    // http://localhost/PHP_labs/php_laba_1/Project/www/index.php
namespace src\Controllers;
use src\View\View;
use src\Services\Db;

class MainController{
    private $view;
    private $db;

    public function __construct()
    {
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
        $this->db = new Db();
    }
    
    public function sayHello(string $name){
        // // (Задание 2.2) добавляем 'title' => 'Страница приветствия' // передаем ассоциативный массив, который содержит title
        // $this->view->renderHtml('main/hello.php', ['name'=>$name, 'title' => 'Страница приветствия']); // Метод renderHtml() отвечает за то, чтобы скомпилировать шаблон с переданными данными и вывести полученный HTML в браузер.
        $this->view->renderHtml('main/hello.php', ['name'=>$name, 'title' => 'Страница приветствия']);
    }


    // задание 2.1 
    public function sayBye(string $name){
        // (Задание 2.2) добавляем 'title' => 'Пока!'
        $data = ['name' => $name, 'title' => 'До свидания!']; // Подготавливаем данные для передачи в шаблон.
        // Рендерим HTML-шаблон 'main/bye.php' и передаем в него данные.
        $this->view->renderHtml('main/bye.php', $data); // Метод renderHtml() отвечает за то, чтобы скомпилировать шаблон с переданными данными и вывести полученный HTML в браузер.
    }

    
    // public function main(){
    //     $sql = 'SELECT * FROM `articles`';
    //     $articles = $this->db->query($sql);
    //     // var_dump($articles);
    //     $this->view->renderHtml('main/main', ['articles'=>$articles]);
    // }
}