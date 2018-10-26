<?php

$chrFirst = readline();
$chrSecond = readline();

function printCharsInRange($first, $second){
    $start = 0;
    $end = 0;
    if(ord($first) < ord($second)){
        $start = $first;
        $end = $second;
    } else {
        $start = $second;
        $end = $first;
    }
    for ($i = ord($start) + 1; $i < ord($end); $i++) {
        echo chr($i).' ';
    }
}

printCharsInRange($chrFirst, $chrSecond);