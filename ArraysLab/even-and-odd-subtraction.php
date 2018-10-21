<?php

$arr = explode(' ', readline());
$sumEven = 0;
$sumOdd = 0;

for ($i = 0; $i < count($arr); $i++) {
    if($arr[$i] % 2 === 0){
        $sumEven += $arr[$i];
    } else {
        $sumOdd += $arr[$i];
    }
}

echo $sumEven - $sumOdd;

