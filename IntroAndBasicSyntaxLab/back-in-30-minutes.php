<?php

$hours = intval(readline());
$minutes = intval(readline());

$minutesAfter30 = $minutes + 30;

if($minutesAfter30 > 59){
    $hours ++;
    $minutes -= 30;
} else {
    $minutes = $minutesAfter30;
}

if($hours > 23){
    $hours = $hours - 24;
}

if($minutes < 10){
    echo "$hours:0". abs($minutes);
} else {
echo "$hours:". abs($minutes);
}