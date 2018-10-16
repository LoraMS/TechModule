<?php

$n = intval(readline());
$max = 0;
$sum = 0;
for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', readline());
    $first = floatval($input[0]);
    $second = floatval($input[1]);

    if($first > $second){
        $max = $input[0];
    } else {
        $max = $input[1];
    }
    
    $arr = str_split($max);  
    
    for ($j = 0; $j < count($arr); $j++) {
        $sum += intval($arr[$j]);
    }
    
    echo $sum .PHP_EOL;
    $sum = 0;
}

