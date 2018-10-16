<?php

$day = strtolower(readline());
$age = intval(readline());
$price = 0;

if($age >= 0 && $age <= 18){
    if ($day === 'weekday') {
        $price = 12;
    } elseif ($day === 'weekend') {
        $price = 15;
    } elseif ($day == 'holiday') {
        $price = 5;
    }
} elseif($age > 18 && $age <= 64){
    if ($day === 'weekday') {
        $price = 18;    
    } elseif ($day === 'weekend') {
        $price = 20;
    } elseif ($day == 'holiday') {
        $price = 12;
    }
} elseif ($age > 64 && $age <= 122){
    if ($day === 'weekday') {
        $price = 12;    
    } elseif ($day === 'weekend') {
        $price = 15;
    } elseif ($day == 'holiday') {
        $price = 10;
    }
} else {
    $price = 0;
}

if($price != 0){
    echo $price.'$';
} else {
    echo 'Error!';
}