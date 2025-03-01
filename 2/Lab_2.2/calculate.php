<?php

// Обработка POST-запроса с выражением
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['expression'])) {
    $expression = $_POST['expression'];

    // Проверка валидности выражения (только цифры, операторы, скобки и пробелы)
    if (isValidExpression($expression)) {
        try {
            // Вычисление выражения
            $result = evaluateExpression($expression);
            echo $result; // Возврат результата
        } catch (Exception $e) {
            echo "Ошибка: некорректное выражение";
        }
    } else {
        echo "Ошибка: некорректное выражение";
    }
} else {
    echo "Ошибка: отсутствует выражение";
}

// Функция для проверки валидности выражения

function isValidExpression($expression) {
    return preg_match('/^[0-9+\-*/(). ]+$/', $expression);
}

// Функция для вычисления выражения
function evaluateExpression($expression) {
    $expression = str_replace(' ', '', $expression); // Удаление пробелов

    // Обработка скобок: рекурсивно вычисляем подвыражения в скобках
    while (preg_match('/\(([^()]+)\)/', $expression, $match)) {
        $subResult = calculate($match[1]); // Рекурсивный вызов для подвыражения
        $expression = str_replace($match[0], $subResult, $expression); // Замена подвыражения результатом
    }

    // Вычисление выражения без скобок
    return calculate($expression);
}


function calculate($expr) {
    // Сначала умножение и деление
    // preg_match — Выполняет проверку на соответствие регулярному выражению
    // регулярное выражение разбивает строку на три группы, соответствующие математическому выражению с двумя числами и знаком между ними.

    while (preg_match('/(-?\d+)\s*([*/])\s*(-?\d+)/', $expr, $match)) {
        $left = $match[1];
        $operator = $match[2];
        $right = $match[3];

        // Выполнение операции
        if ($operator === '*') {
            $result = $left * $right;
        } else {
            $result = $left / $right;
        }

        // Замена подстроки результатом
        $expr = str_replace($match[0], $result, $expr);
    }

    // Потом сложение и вычитание
    while (preg_match('/(-?\d+)\s*([+-])\s*(-?\d+)/', $expr, $match)) {
         $left = $match[1];
        $operator = $match[2];
        $right = $match[3];

        // Выполнение операции
        if ($operator === '+') {
            $result = $left + $right;
        } else {
            $result = $left - $right;
        }

        // Замена подстроки результатом
        $expr = str_replace($match[0], $result, $expr);
    }

    return $expr; // Возврат финального результата
}

?>



