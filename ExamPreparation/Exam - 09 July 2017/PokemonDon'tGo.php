<?php
$array = array_map('intval', explode(' ', readline()));
$sum = 0;

while (true){
    if(count($array) <= 0){
        break;
    }
    $index = intval(readline());
    $element = $array[0];
    if($index > count($array)-1){
        $last = array_pop($array);
        $element = $last;
        $sum += $element;
        array_push($array, $array[0]);
    } elseif($index < 0){
        $last = end($array);
        $element = $array[0];
        $sum += $element;
        array_shift($array);
        array_unshift($array, $last);
    } else {
        $element = $array[$index];
        $sum += $element;
        array_splice($array, $index, 1);
    }

    for($i = 0; $i < count($array); $i++){
        if($array[$i] <= $element){
            $array[$i] += $element;
        } else {
            $array[$i] -= $element;
        }
    }
}

echo $sum;