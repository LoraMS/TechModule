<?php

$n = readline();

echo getMultipleOfEvenAndOdds($n);

function getMultipleOfEvenAndOdds($n){
    $evensSum = getSumOfEvenDigits($n);
    $oddsSum = getSumOfOddDigits($n);
    
    return $evensSum * $oddsSum;
}

function getSumOfEvenDigits($n){
    $sum = 0;
    for ($i = 0; $i < strlen($n); $i++) {
        if (intval($n[$i]) % 2 === 0) {
            $sum += intval($n[$i]);
        }
    }
    return $sum;
}

function getSumOfOddDigits($n){
    $sum = 0;
    for ($i = 0; $i < strlen($n); $i++) {
        if (intval($n[$i]) % 2 !== 0) {
            $sum += intval($n[$i]);
        }
    }
    return $sum;
}