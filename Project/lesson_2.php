<?php
// http://localhost/PHP_labs/php_laba_1/Project/lesson_2.php

$arr = [2, 'r', 6, 8];
for ($i = 0; $i < sizeof($arr); $i++) {
    echo $arr[$i].' ';
}


$arr2[2] = 2;
$arr2['b'] = 'r';
$arr2['c'] = 6;
$arr2[4] = 8;

for ($i = 0; $i < sizeof($arr); $i++) {
    echo $arr[$i].' '.'<BR>';
}

$arr3 = [
    1=>2,
    2=> 3,
    3=> 's',
];



echo $arr3[1].' ';
echo '<BR>'; 


print_r($arr3);


// $arr4 = [
//     1=> [1,2,3,4,5,6],
//     'rq'=> [1, 2,3,4,'gf'],
// ];

// echo $arr4[1]. ' ';

///// Функции

function f($a, $b):float { // float - возвращаем определенный тип данных

return $a + $b;
}

var_dump(f(1, 4));  



