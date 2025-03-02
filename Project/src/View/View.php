<?php

namespace src\View;

class View{
    private $templatesPath;
    private $defaultTitle = 'Мой блог'; // Заголовок по умолчанию (Задание 2.2)

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, $vars=[])
    {
        extract($vars);

         // Получаем title из $vars, если он там есть. (Задание 2.2)
         $title = $vars['title'] ?? $this->defaultTitle;  // Используем заголовок из $vars, если он задан, иначе используем заголовок по умолчанию

        include $this->templatesPath.'/'.$templateName;
    }

    // public function getDefaultTitle(): string // (Задание 2.2)
    // {
    //     return $this->defaultTitle;
    // }
}