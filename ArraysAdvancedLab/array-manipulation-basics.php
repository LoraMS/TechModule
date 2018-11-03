<?php

$array = array_map('intval', explode(' ', readline()));

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }
    $line = explode(' ', $input);
    $command = strtolower($line[0]);
    if($command === 'add'){
        array_push($array, $line[1]);
    } elseif($command === 'remove'){
        $index = array_search($line[1], $array);
        unset($array[$index]);
    } elseif ($command === 'removeat') {
        array_splice($array, $line[1], 1);
    } elseif ($command === 'insert') {
        array_splice($array, $line[2], 0, $line[1]);
    }
}

echo implode(' ', $array);