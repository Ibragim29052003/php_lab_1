<?php
session_start(); // Обязательно запускаем сессию

// Проверяем, установлена ли страна в сессии
if (isset($_SESSION["country"])) {
    // Получаем страну из сессии
    $country = $_SESSION["country"];

    // Выводим страну пользователя
    echo "<h1>Страна пользователя:</h1>";
    echo "<p>" . htmlspecialchars($country) . "</p>";
} else {
    // Если страна не установлена, предлагаем перейти на index.php
    echo "<p>Страна не определена. Пожалуйста, перейдите на <a href='index.php'>index.php</a> чтобы ее указать.</p>";
}
?>
