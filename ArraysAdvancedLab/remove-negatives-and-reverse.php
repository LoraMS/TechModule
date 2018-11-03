<?php

$array = array_map('intval', explode(' ', readline()));
$arrayFiltered = array_filter($array, function ($x){
    return $x > 0;
});

if(count($arrayFiltered) <= 0){
    echo 'empty';
} else {
    $result = array_reverse($arrayFiltered);
    echo implode(' ', $result);
}


//$array = array_map('intval', explode(' ', readline()));
//
//for ($i = 0; $i < count($array); $i++) {
//    if ($array[$i] < 0) {
//        array_splice($array, $i, 1);
//        $i --;
//    }
//}
//
//$array = array_reverse($array);
//
//if(count($array) <= 0){
//    echo 'empty';
//} else {
//    
//    echo implode(' ', $array);
//}

