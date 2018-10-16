<?php

$amount = floatval(readline());
$students = intval(readline());
$lightsabersPrice = floatval(readline());
$robesPrice = floatval(readline());
$beltsPrice = floatval(readline());

$lightsabers = ceil($students * 0.1 + $students) * $lightsabersPrice;
$robes = $students * $robesPrice;
$freeBelts = floor($students / 6);
$belts = ($students - $freeBelts) * $beltsPrice;

$price = $lightsabers + $robes + $belts;

if($amount >= $price){
    echo "The money is enough - it would cost ".number_format($price, 2, '.', '')."lv.";
} else {
    echo "Ivan Cho will need ". number_format($price-$amount, 2, '.', '')."lv more.";
}

