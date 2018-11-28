<?php
$bigNumber = readline();
$digit = intval(readline());
$resultNumber = '';
$result = 1;
$onMind = 0;

$reversedBigNum = strrev($bigNumber);

if($bigNumber === '0' || $digit === 0){
    echo '0';
    return;
}

for($i = 0; $i < strlen($reversedBigNum); $i++){
    $firstDigit = intval($reversedBigNum[$i]);

    $result = $firstDigit * $digit + $onMind;
    $resultNumber .= $result % 10;
    $onMind = intval($result / 10);

    if($i === (strlen($reversedBigNum)-1) && $onMind !== 0){
        $resultNumber .= $onMind;
    }
}

echo strrev($resultNumber);