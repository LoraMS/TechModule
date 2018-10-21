<?php

$arr = array_map('intval', explode(' ', readline()));
$isFound = false;

for ($i = 0; $i < count($arr); $i++) {   
    $sumLeft = 0;
    for ($j = 0; $j < $i; $j++) {
        $sumLeft += $arr[$j];
    }
    
    $sumRight = 0;
    for ($n = $i+1; $n < count($arr); $n++) {
        $sumRight += $arr[$n];
    }
    
    if ($sumRight === $sumLeft) {
        echo $i;
        $isFound = true;
        return;
    } 
}

if(!$isFound){
    echo 'no';
}