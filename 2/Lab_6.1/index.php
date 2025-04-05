<?php
// http://localhost/PHP_labs/php_laba_1/2/Lab_6.1/index.php

session_start(); // Обязательно запускаем сессию

// Обрабатываем форму, если она была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем страну из формы
    $country = $_POST["country"];

    // Записываем страну в сессию
    $_SESSION["country"] = $country;

    // Выводим сообщение об успехе (можно и редирект сделать)
    echo "<p>Страна установлена: " . htmlspecialchars($country) . "</p>";
}

// Отображаем форму (всегда, даже после отправки, чтобы можно было изменить страну)
?>
<!DOCTYPE html>
<html>
<head>
    <title>Укажите вашу страну</title>
</head>
<body>
    <h1>Укажите вашу страну:</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="country">Страна:</label><br>
        <input type="text" id="country" name="country" required><br><br>

        <input type="submit" value="Сохранить">
    </form>
</body>
</html>
