<!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab_2.1</title>
        <link rel="stylesheet" href="style.css"> 
    </head>
    <body>

        <header>
            <div class="header__block">
            <div class="header__logo">
                <img class="header__logo_img" src="mospolytech_logo.png" alt="Логотип МосПолитеха">
            </div>
            <h1 class="header__title">Динамический контент на PHP</h1>
            </div>
        </header>

        <main>
            <div class="dynamic-content">
                <?php
                // http://localhost/PHP_labs/php_laba_1/2/Lab_2.1/index.php
                    $current_time = date("H:i:s");
                    $title_class .= "title__php"; // создаем переменную которую присвоим классу ///////////  вынести в html
                    echo "<h1 class='" . $title_class . "'>Привет, Мир!</h1>";
                    echo "<p>Текущее время: " . $current_time . "</p>";

                    //это можно сделать в html и открыть скрипт внутри тега p <?$time?>
                                         

                ?>
                
            </div>
        </main>

        <footer>
            <p class="footer__descr">Задание для самостоятельной работы</p>
        </footer>

    </body>
    </html>
