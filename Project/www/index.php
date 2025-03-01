<?php

// use src\Models\Articles\Article;
//  точка входа 


spl_autoload_register(function (string $className) { // анонимная фунция 
    require_once dirname(__DIR__).'\\'.$className.'.php' ;
});
    
// spl_autoload_register("myAutoload");
//     require_once dirname(__DIR__). '/src/Models/Articles/Article.php' ; 
//     require_once dirname(__DIR__). '/src/Models/Users/User.php' ;
    // echo dirname (__DIR__). '/src/Models/Article/Article.php';
    // http://localhost/PHP_labs/php_laba_1/Project/www/index.php
    // file:///Applications/XAMPP/xamppfiles/htdocs/PHP_labs/php_laba_1/Project/www/index.php

    // $controller = new src\Controllers\MainController();
    // $controller->sayHello() ;s
    $user = new src\Models\Users\User('Ivan');
    $article  = new src\Models\Articles\Article('title', 'text', $user);

    var_dump($user);
    var_dump($article);







// require_once dirname(__DIR__). '/src/Models/Articles/Article.php' ; 
// require_once dirname(__DIR__). '/src/Models/Users/User.php' ;

// $author = new User('Иван')
// $article = new Article('Заголовок', 'текст', $author);
// var_dump($article)


?>