<?php

// Страница 2: session2.php
session_start(); // Обязательно запускаем сессию

// Проверяем, установлены ли переменные сессии
if (isset($_SESSION['username']) && isset($_SESSION['favorite_color'])) {
  $username = $_SESSION['username'];
  $favorite_color = $_SESSION['favorite_color'];

  echo "Имя пользователя: " . $username . "<br>";
  echo "Любимый цвет: " . $favorite_color . "<br>";
} else {
  echo "Данные сессии не найдены.  Возможно, вы не посещали <a href='session.php'>первую страницу</a>.";
}

?>



