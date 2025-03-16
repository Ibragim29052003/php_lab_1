<?php
    // http://localhost/PHP_labs/php_laba_1/Project/www/index.php
    // file:///Applications/XAMPP/xamppfiles/htdocs/PHP_labs/php_laba_1/Project/www/index.php
    
    // spl_autoload_register(function(string $className){
    //     require_once dirname(__DIR__).'\\'.$className.'.php';
    // });


    // временно, до решения проблемы (Error: Controller class not found: src\Controllers\ArticleController)
    spl_autoload_register(function(string $className){
        $path = str_replace('\\', '/', $className) . '.php'; // Заменяем обратные слеши на прямые
        $fullPath = dirname(__DIR__) . '/src/' . $path; // Корректный путь к файлу
        if (file_exists($fullPath)) {
            require_once $fullPath;
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
    
    if (!$findRoute) echo "Page not found (404)";


    $user = new src\Models\Users\User('Ivan');
    $article = new src\Models\Articles\Article('title', 'text', $user);

    // var_dump($user);
    // var_dump($article);