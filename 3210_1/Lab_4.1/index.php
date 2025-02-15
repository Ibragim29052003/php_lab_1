<!-- // http://localhost/PHP_labs/php_laba_1/3210_1/Lab_4.1/index.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <header class="header">
        <div class="header__logo">
            <img src="mospolytech_logo.png" alt="Логотип МосПолитеха" class="header__logo-image">
        </div>
        <h1 class="header__title">Feedback Form</h1>
    </header>

    <main class="main">
        <form class="form" action="https://httpbin.org/post" method="POST">
            <div class="form__group">
                <label for="username" class="form__label">Имя пользователя:</label>
                <input type="text" id="username" name="username" class="form__input" required>
            </div>

            <div class="form__group">
                <label for="email" class="form__label">E-mail пользователя:</label>
                <input type="email" id="email" name="email" class="form__input" required>
            </div>

            <div class="form__group">
                <label for="type" class="form__label">Тип обращения:</label>
                <select id="type" name="type" class="form__select" required>
                    <option value="">Выберите тип</option>
                    <option value="жалоба">Жалоба</option>
                    <option value="предложение">Предложение</option>
                    <option value="благодарность">Благодарность</option>
                </select>
            </div>

            <div class="form__group">
                <label for="message" class="form__label">Текст обращения:</label>
                <textarea id="message" name="message" class="form__textarea" rows="5" required></textarea>
            </div>

            <div class="form__group">
                <p class="form__label">Вариант ответа:</p>
                <label class="form__checkbox-label">
                    <input type="checkbox" name="response_sms" value="sms" class="form__checkbox"> SMS
                </label>
                <label class="form__checkbox-label">
                    <input type="checkbox" name="response_email" value="email" class="form__checkbox"> E-mail
                </label>
            </div>

            <button type="submit" class="form__button">Отправить</button>
        </form>

        <a href="results.php" class="main__link">Перейти на страницу с заголовками</a>
    </main>

    <footer class="footer">
        <p class="footer__text">Задание для самостоятельной работы</p>
    </footer>
</body>
</html>
