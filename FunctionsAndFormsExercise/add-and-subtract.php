<?php

$firstNum = intval(readline());
$secondNum = intval(readline());
$thirdNum = intval(readline());

$sum = sum($firstNum, $secondNum);
$subtract = subtract($sum, $thirdNum);
echo $subtract;

function sum($m, $n){
    return $m + $n;
}

function subtract($m, $n){
    return $m - $n;
}