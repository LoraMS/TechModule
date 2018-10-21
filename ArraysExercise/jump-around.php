<?php

$array = array_map('intval', explode(' ', readline()));
$sum = $array[0];
$startValue = $array[0];
$nextIndex = 0;

while (true){
    if($nextIndex + $startValue < count($array)){
       $nextIndex += $startValue;
    } elseif ($nextIndex - $startValue >= 0) {
        $nextIndex -= $startValue;
    } else {
        break;
    }
    
    $sum += $array[$nextIndex];
    $startValue = $array[$nextIndex];
}


echo $sum;

// 3 7 12 2 10

//80/100
/*
 $array = array_map('intval', explode(' ', readline()));
$sum = $array[0];
$startValue = $array[0];
$startIndex = 0;
$nextIndexRight = 0;

while (true){
    $nextIndexRight += $startValue;
    if($nextIndexRight >= count($array)){
        break;
    }
    
    $sum += $array[$nextIndexRight];
    $startIndex = $nextIndexRight;
    $startValue = $array[$nextIndexRight];
}

$nextIndexLeft = $startIndex;
while (true) {
    $nextIndexLeft -= $startValue;
    if($nextIndexLeft < 0){
        break;
    }
    $sum += $array[$nextIndexLeft];
    $startValue = $array[$nextIndexLeft];
}

echo $sum;
 */



