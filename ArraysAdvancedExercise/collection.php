<?php

$arr = [];

while (true) {
    $input = readline();
    if($input === 'Print'){
        break;
    }
    $line = explode(' ', $input);
    $command = $line[0];
    if($command === 'Push'){
        $element = $line[1];
        array_unshift($arr, $element);
    } elseif($command === 'Add'){
        $element = $line[1];
        array_push($arr, $element);
    } elseif($command === 'Pop'){
        array_shift($arr);
    } elseif($command === 'Enqueue'){
        array_pop($arr);
    } 

}

echo implode(' ', $arr);