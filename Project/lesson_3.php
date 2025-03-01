
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <!-- <h1>Введите число:</h1>

  <form method="GET" action="">
    <label for="number">Число:</label>
    <input type="number" name="number">
    <button type="submit">Отправить</button>
  </form> -->

  <?php
// http://localhost/PHP_labs/php_laba_1/Project/lesson_3.php
// Задание 26
// GET. Отправьте с помощью GET-запроса число. Выведите его на экран.

//   if (isset($_GET['number'])) {
//     $number = ($_GET['number']);

//     if (is_numeric($number)) {
//       echo "Вы отправили число: " . $number ;
//     } else {
//         echo "Пожалуйста, введите корректное число.";
//     }
//   }

  ?>



<!-- 
<h1>Введите число 1 или 2:</h1>

<form method="GET" action="">
  <label for="number">Число:</label>
  <input type="number" name="number">
  <button type="submit">Отправить</button>
</form> -->

 <?php
// Задание 27
// GET. Пусть с помощью GET-запроса отправляется число. Оно может быть или 1, или 2. Сделайте так, чтобы если передано 1 - на экран вывелось слово 'привет', а если 2 - то слово 'пока'.

// if (isset($_GET['number'])) {
//   $number = $_GET['number'];

//   if (is_numeric($number)) {
//     if ($number == 1) {
//       echo 'привет';
//     } elseif ($number == 2) {
//       echo 'пока';
//     } else {
//       echo 'Введите число 1 или 2.';
//     }
//   } else {
//     echo 'Пожалуйста, введите корректное число.';
//   }
// }
?>



<h1>Введите два числа:</h1>

<form method="GET" action="">
  <label for="number1">Число 1:</label>
  <input type="number" name="number1"><br><br>
  <label for="number2">Число 2:</label>
  <input type="number" name="number2"><br><br>
  <button type="submit">Отправить</button>
</form>

 <?php
// Задание 28
//GET. Отправьте с помощью GET-запроса два числа. Выведите его на экран сумму этих чисел.

if (isset($_GET['number1']) && isset($_GET['number2'])) {
  $number1 = $_GET['number1'];
  $number2 = $_GET['number2'];

  if (is_numeric($number1) && is_numeric($number2)) { // проверка на число и на пустоту
    $sum = $number1 + $number2;
    echo 'Сумма чисел: ' . $sum;
  } else {
    echo 'Пожалуйста, введите корректные числа.';
  }
} 
?>




</body>
</html>