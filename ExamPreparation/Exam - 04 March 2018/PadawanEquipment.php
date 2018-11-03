<?php

$amount = floatval(readline());
$students = intval(readline());
$sabresPrice = floatval(readline());
$robesPrice = floatval(readline());
$beltsPrice = floatval(readline());

$robes = $students * $robesPrice;
$sabres = ceil($students + $students * 0.1) * $sabresPrice;
$freeBelts = floor($students / 6);
$belts = ($students - $freeBelts) * $beltsPrice;

$costs = $robes + $sabres + $belts;

if($amount >= $costs){
    echo 'The money is enough - it would cost '.sprintf('%.2f', $costs).'lv.';
} else {
    echo 'Ivan Cho will need '.sprintf('%.2f', ($costs - $amount)).'lv more.';
}