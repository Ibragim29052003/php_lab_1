<?php
// http://localhost/phpmyadmin/index.php?route=/database/sql&db=project-3210
    // http://localhost/PHP_labs/php_laba_1/Project/www/index.php
    // file:///Applications/XAMPP/xamppfiles/htdocs/PHP_labs/php_laba_1/Project/www/index.php
    
    // spl_autoload_register(function(string $className){
    //     require_once dirname(__DIR__).'\\'.$className.'.php';
    // });

// возможная проблема в autoload_register

    // // временно, до решения проблемы (Error: Controller class not found: src\Controllers\ArticleController)
    // spl_autoload_register(function(string $className){
    //     $path = str_replace('\\', '/', $className) . '.php'; // Заменяем обратные слеши на прямые
    //     $fullPath = dirname(__DIR__) . '/' . $path; // Корректный путь к файлу
    //     if (file_exists($fullPath)) {
    //         include $fullPath;
    //     }
    // });


    


    define('DIR', __DIR__); // Определяем константу DIR с текущим каталогом

use Exceptions\DbException;
use Exceptions\NotFoundException;

try{

    spl_autoload_register(function (string $className) {
        $className = ltrim($className, '\\'); // Удаляем ведущий слеш, если он есть
        $className = str_replace('src\\', '', $className); // Удаляем "src\" из начала
    
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    
        $fullPath = dirname(__DIR__) . '/src/' . $fileName;  // Исправленный путь
    
        if (file_exists($fullPath)) {
            require_once $fullPath;
        } else {
            echo "Файл не найден: " . $fullPath . "<br>";
        }
    });
    
    $findRoute = false;
    
    $route = $_GET['route'] ?? '';
    // var_dump($route);
    $patterns = require 'route.php';
    foreach ($patterns as $pattern=>$controllerAndAction){
        preg_match($pattern, $route, $matches);
        if (!empty($matches)){
            $findRoute = true;
            unset($matches[0]);
            $nameController = $controllerAndAction[0];
            $actionName = $controllerAndAction[1];
            $controller = new $nameController;
            $controller->$actionName(...$matches);
            break;
        }
    }
    
    // if (!$findRoute) echo "Page not found (404)";

    if (!$findRoute) throw new Exceptions\NotFoundException();

}catch(DbException $e){
    $view = new src\View\View(dirname(__DIR__).'/templates');
    $view->renderHtml('errors/500', ['error'=>$e->getMessage()], 500);
}
catch(NotFoundException $e){
    $view = new src\View\View(dirname(__DIR__).'/templates');
    $view->renderHtml('errors/400', ['error'=>$e->getMessage()], 404);
}

    $user = new src\Models\Users\User('Ivan');
    $article = new src\Models\Articles\Article('title', 'text', $user);

    // var_dump($user);
    // var_dump($article);







