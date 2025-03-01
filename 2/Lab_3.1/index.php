<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Преобразование текста</title>
</head>
<body>

<h1>Преобразование текста</h1>

<form method="POST">
    <label for="text">Введите текст:</label><br>
    <textarea id="text" name="text" rows="4" cols="50"><?= htmlspecialchars($_POST['text'] ?? '') ?></textarea><br><br>
    <input type="submit" value="Преобразовать">
</form>

<?php

function convertEverySecondWordToUppercase(array $words): array {
    $result = [];
    $index = 0;
    foreach ($words as $word) {
        $result[] = ($index % 2 != 0) ? mb_strtoupper($word) : $word;
        $index++; // Инкрементируем индекс ПОСЛЕ добавления элемента
    }
    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text"])) {
    $words = explode(" ", $_POST["text"]);
    $transformedWords = convertEverySecondWordToUppercase($words);
    echo "<h2>Результат:</h2><p>" . htmlspecialchars(implode(" ", $transformedWords)) . "</p>";
}
?>

</body>
</html>










<!-- задание 21 -->
 <!-- Символическая ссылка. Вводится римскими цифрами век. Нужно напечатать, кто царствовал в этом веке. Например, ввели "XVI", нужно вывести "В XVI веке царствовал Иван Васильевич". Дано: $XVI="Иван Васильевич"; $XVIII="Пётр Алексеевич"; $XIX="Николай Павлович"; -->

 <?php
// Function to convert Roman numerals to Arabic numerals
function romanToArabic($roman) {
    $romanNumerals = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1,
    ];

    $arabic = 0;
    $roman = strtoupper($roman); 

    foreach ($romanNumerals as $key => $value) {
        while (strpos($roman, $key) === 0) {
            $arabic += $value;
            $roman = substr($roman, strlen($key));
        }
    }

    return $arabic;
}

// Data about rulers and their centuries
$rulers = [
    'XVI' => 'Ivan Vasilyevich',
    'XVIII' => 'Pyotr Alekseevich',
    'XIX' => 'Nikolai Pavlovich',
];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roman'])) {
    $romanInput = strtoupper(trim($_POST['roman'])); // Get and sanitize input

    // Convert Roman numeral to Arabic numeral
    $century = romanToArabic($romanInput);

    // Check if the century exists in the rulers array
    if (array_key_exists($romanInput, $rulers)) {
        $ruler = $rulers[$romanInput];
        $output = "In the $century" . "th century, $ruler reigned.";
    } else {
        $output = "No ruler information found for the $century" . "th century.";
    }
} else {
    $output = "Please enter a Roman numeral for the century.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Century Ruler Lookup</title>
</head>
<body>
    <h1>Find the Ruler of a Century</h1>
    <form method="POST" action="">
        <label for="roman">Enter the century in Roman numerals (e.g., XVI):</label><br>
        <input type="text" name="roman" id="roman" value="<?php echo isset($_POST['roman']) ? htmlspecialchars($_POST['roman']) : ''; ?>"><br><br>
        <input type="submit" value="Find Ruler">
    </form>

    <h2>Result:</h2>
    <p><?php echo $output; ?></p>
</body>
</html>