<?php

    return [
        "~^$~" => [src\Controllers\MainController::class, 'main'],
        "~^hello/(.*)$~" =>[src\Controllers\MainController::class, 'sayHello'],
        "~^bye/(.*)$~" =>[src\Controllers\MainController::class, 'sayBye'], // задание 2.1 
    ];