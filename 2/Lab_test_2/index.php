<?php

// http://localhost/PHP_labs/php_laba_1/2/Lab_test_2/index.php

// // Задание 1
// //array_count_values. Дан массив с элементами 'a', 'b', 'c', 'b', 'a'. Подсчитайте сколько раз встречается каждая из букв.

// $array_count_values = ['a', 'b', 'c', 'b', 'a'];

// $count = 0;

// $counts = array_count_values($array_count_values); // встроенная функция 
// print_r($counts);

// // for ($i; $i < sizeof($array_count_values); $i++) {
// //     if ($array_count_values[$i] == $array_count_values[$i+1]) {
// //         $count++;
// //         echo''. $array_count_values[$i] .'';
// // }
// // }




/// Задание 8

// // array_product. Дан массив [1, 2, 3, 4, 5]. Найдите произведение (умножение) элементов данного массива.(вам понадобятся следующие функции: array_product.)

// $arr = [1, 2, 3, 4, 5];

// $product_sum = array_product($arr);
// $product_multi = array_sum($arr);

// echo $product_sum;
// echo '<BR>'; 
// echo $product_multi;


// // $count_sum = 0;
// // $count_mult = 0;

// // for ($i; $i < sizeof($arr); $i++) {
  
// //     $count_sum += $i;
// //     $count_mult *= $i;
// //     return $arr[$i];
// // }

// // echo "$count_sum". $arr[$i] . "$count_mult";

// // print_r($count_sum);
// // echo '<BR>'; 
// // print_r($count_mult);




// /// Задание 3
// // array_flip, array_reverse. Дан массив с элементами 1, 2, 3, 4, 5. Сделайте из него массив с элементами 5, 4, 3, 2, 1 

// $arr = [1, 2, 3, 4, 5];

// $arr_reverse = array_reverse($arr);

// print_r($arr_reverse);


// задание 4

// // array_keys, array_values, array_combine. Даны два массива: ['a', 'b', 'c'] и [1, 2, 3]. Создайте с их помощью массив 'a'=>1, 'b'=>2, 'c'=>3'.

// $arr = ['a', 'b', 'c'];
// $arr2 = [1, 2, 3];

// $array_kyes = array_keys($arr);
// $array_values = array_values($arr);
// $array_kyes2 = array_keys($arr2);
// $array_values2 = array_values($arr2);

// print_r($array_kyes);
// print_r($array_values);
// print_r($array_kyes2);
// print_r($array_values2);


// Задание 5
// // array_keys, array_values, array_combine. Дан массив 'a'=>1, 'b'=>2, 'c'=>3'. Запишите в массив $keys ключи из этого массива, а в $values – значения.

// $arr = ['a'=>1, 'b'=>2, 'c'=>3];

// $keys = array_keys($arr);
// $values = array_values($arr);

// print_r($keys);
// print_r($values);

// $combine = array_combine($keys, $values);

// print_r($combine);
