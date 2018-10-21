<?php

$array = array_map('intval', explode(' ', readline()));
$end = 0;
$counter = 1;
$maxCounter = 1;

for ($i = 0; $i < count($array) - 1; $i++) {
    if($array[$i] === $array[$i + 1]){
        $counter ++;
        if($counter > $maxCounter){
            $maxCounter = $counter;
            $end = $i + 1;
        }
    } else {
            $counter = 1;
    }
}

for ($j = $end - $maxCounter + 1; $j <= $end; $j++) {
    echo $array[$j].' ';
}