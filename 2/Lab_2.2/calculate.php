<?php

// Устанавливаем тип контента для ответа
header('Content-Type: text/plain; charset=utf-8');

// Проверяем, что запрос был отправлен методом POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo "Ошибка: Только POST запросы разрешены.";
    exit;
}

// Получаем выражение из POST-запроса
$expression = $_POST['expression'] ?? '';

// Обрезаем пробелы в начале и конце строки
$expression = trim($expression);

// Проверка на пустое выражение
if (empty($expression)) {
    echo "Ошибка: Введите выражение для расчёта.";
    exit;
}

// Проверка на недопустимые символы, стоящие рядом со скобками
if (preg_match('/\)[0-9]/', $expression) || preg_match('/[0-9]\(/', $expression)) {
    echo "Ошибка: Недопустимые символы рядом со скобками.";
    exit;
}

// Проверка на допустимые символы 
if (!preg_match('/^[0-9+\-*\/().\s]+$/', $expression)) {
    echo "Ошибка: Недопустимые символы в выражении.";
    exit;
}

// Проверка на наличие только операторов или скобок (бессмысленное выражение)
if (preg_match('/^[()+\-*\/ ]+$/', $expression)) {
    echo "Ошибка: Введите числа для расчёта.";
    exit;
}

// Проверка деления на ноль
if (strpos($expression, '/0') !== false) {
    echo "Ошибка: Деление на ноль запрещено.";
    exit;
}

// Проверка на два оператора подряд
if (preg_match('/[+\-*\/]{2,}/', $expression)) {
    echo "Ошибка: Два или более оператора подряд недопустимы.";
    exit;
}



 function calculate($expression) {
    // Удаляем все пробелы из выражения
    $expression = str_replace(' ', '', $expression);

    // Массив для вывода (результат после обработки)
    $output = [];
    
    // Стек для хранения операторов
    $operators = [];
    
    // Преоритет операторов, более высокий приоритет для *, /
    $precedence = ['+' => 1, '-' => 1, '*' => 2, '/' => 2];
    
    // Длина выражения
    $length = strlen($expression);
    
    // Переменная для хранения числа
    $number = '';
    
    // Проходим по каждому символу выражения
    for ($i = 0; $i < $length; $i++) {
        $char = $expression[$i];

        // Если символ - это цифра или точка (для дробных чисел), добавляем его к числу
        if (is_numeric($char) || $char == '.') {
            $number .= $char;
        } else {
            // Если текущий символ не число и в переменной $number есть число, добавляем его в вывод
            if ($number !== '') {
                $output[] = $number;
                $number = '';  // Очищаем переменную для следующего числа
            }
            
            // Обрабатываем минус перед числом (например, для отрицательных чисел)
            if ($char == '-' && ($i == 0 || $expression[$i - 1] == '(')) {
                $number .= $char;
            } elseif ($char == '(') {
                // Если встретили открывающую скобку, добавляем ее в стек операторов
                $operators[] = $char;
            } elseif ($char == ')') {
                // Если встретили закрывающую скобку, вынимаем операторы до открывающей скобки
                while (end($operators) != '(') {
                    $output[] = array_pop($operators);
                }
                array_pop($operators);  // Убираем открывающую скобку из стека
            } else {
                // Если встретили оператор, вынимаем операторы из стека, если они имеют больший или равный приоритет
                while (!empty($operators) && end($operators) != '(' && $precedence[$char] <= $precedence[end($operators)]) {
                    $output[] = array_pop($operators);
                }
                // Добавляем текущий оператор в стек
                $operators[] = $char;
            }
        }
    }
    
    // Если в переменной $number есть последнее число, добавляем его в вывод
    if ($number !== '') {
        $output[] = $number;
    }

    // Очищаем стек операторов, добавляя все оставшиеся операторы в вывод
    while (!empty($operators)) {
        $output[] = array_pop($operators);
    }

    // Стек для вычислений
    $stack = [];
    
    // Проходим по всем токенам (числам и операторам) из вывода
    foreach ($output as $token) {
        if (is_numeric($token)) {
            // Если токен - это число, кладем его в стек
            array_push($stack, $token);
        } else {
            // Если токен - оператор, извлекаем два числа из стека и выполняем операцию
            $b = array_pop($stack);
            $a = array_pop($stack);
            switch ($token) {
                case '+':
                    array_push($stack, $a + $b);
                    break;
                case '-':
                    array_push($stack, $a - $b);
                    break;
                case '*':
                    array_push($stack, $a * $b);
                    break;
                case '/':
                    array_push($stack, $a / $b);
                    break;
            }
        }
    }
    
    // Возвращаем результат последней операции (финальный результат)
    return array_pop($stack);
}

try {
    // Попытка вычислить выражение
    $result = calculate($expression);
    echo $result;  // Выводим результат
} catch (Exception $e) {
    // Обработка ошибок, если вычислить выражение невозможно
    echo "Ошибка: Невозможно вычислить выражение.";
}

?>