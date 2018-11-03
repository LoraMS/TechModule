<?php
$arr = explode(' ', trim(readline()));

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }

    $line = explode(' ', $input);
    $command = $line[0];
    $invalidParameter = false;
    if($command === 'reverse'){
        $start = $line[2];
        $count = $line[4];
        if($start < 0 || $start > count($arr)-1 || $count < 0 || ($start + $count) > count($arr)) {
            echo "Invalid input parameters.".PHP_EOL;
            continue;
        }
        $arr = reverseArr($start, $count, $arr);
    } elseif ($command === 'sort'){
        $start = $line[2];
        $count = $line[4];
        if($start < 0 || $start > count($arr)-1 || $count < 0 || ($start + $count) > count($arr)) {
            echo "Invalid input parameters.".PHP_EOL;
            continue;
        }
        $arr = sortArr($start, $count, $arr);
    } elseif ($command === 'rollLeft'){
        $count = $line[1];
        if($count < 0){
            echo "Invalid input parameters.".PHP_EOL;
            continue;
        }
        $arr = rollLeft($count, $arr);
    } elseif ($command === 'rollRight'){
        $count = $line[1];
        if($count < 0) {
            echo "Invalid input parameters.".PHP_EOL;
            continue;
        }
        $arr = rollRight($count, $arr);
    }
}

echo '['.implode(', ', $arr).']';

function reverseArr($start, $count, $arr){
    $result = [];
    for($i = $start; $i < $count+$start; $i++){
        $result[] = $arr[$i];
    }

    $result = array_reverse($result);
    array_splice($arr, $start, $count);
    array_splice($arr, $start, 0, $result);

    return $arr;
}

function sortArr($start, $count, $arr){
    $result = [];
    for($i = $start; $i < $count+$start; $i++){
        $result[] = $arr[$i];
    }

    sort($result, SORT_STRING);
    array_splice($arr, $start, $count);
    array_splice($arr, $start, 0, $result);

    return $arr;
}

function rollLeft($count, $arr){
    $c = $count % count($arr);
    for($i = 0; $i < $c; $i++){
        $first = array_shift($arr);
        array_push($arr, $first);
    }

    return $arr;
}

function rollRight($count, $arr){
    $c = $count % count($arr);
    for($i = 0; $i < $c; $i++){
        $last = array_pop($arr);
        array_unshift($arr, $last);
    }

    return $arr;
}
