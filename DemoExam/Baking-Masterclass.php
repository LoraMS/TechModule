<?php

$budget = floatval(readline());
$students = intval(readline());
$priceFlour = floatval(readline());
$priceEgg = floatval(readline());
$priceApron = floatval(readline());

$freeFlour = intval($students / 5);
$sumFlour = ($students - $freeFlour) * $priceFlour;
$sumEggs = $students * ($priceEgg * 10);
$sumAprons = ceil($students + $students*0.2) * $priceApron;

$sum = $sumAprons + $sumEggs + $sumFlour;

if($sum <= $budget){
    echo "Items purchased for ". sprintf('%.2f', $sum)."$.";
} else {
    echo sprintf('%.2f', ($sum - $budget))."$ more needed.";
}