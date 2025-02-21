<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результаты get_headers()</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="header">
        <div class="header__logo">
            <img src="mospolytech_logo.png" alt="Логотип МосПолитеха" class="header__logo-image">
        </div>
        <h1 class="header__title">Результаты get_headers()</h1>
    </header>
    

    <main>
        <div class="main__block_result">
        <h2 class="main__title_result">Результат работы get_headers()</h2>
        <textarea rows="20" cols="80"><?php 
// PHP-скрипт запрашивает HTTP-заголовки с https://httpbin.org/post и отображает их в текстовом поле. 
            $headers = get_headers("https://httpbin.org/post"); // get_headers() для получения
            if ($headers) {
                foreach ($headers as $header) {
                    echo htmlspecialchars($header) . "\n"; // htmlspecialchars() для безопасности
                }
            } else {
                echo "Не удалось получить заголовки.";
            }

        ?></textarea>
        </div>

        <a href="index.php" class="main__link">Перейти на Feedback Form</a>
    </main>

    <footer>
        <p class="footer__descr_result">Задание для самостоятельной работы</p>
    </footer>
</body>
</html>

