<?php

$arr = array_map('intval', explode(' ', readline()));
$oddEven = '';

while (true) {
    $input = readline();
    if ($input === 'Odd' || $input === 'Even') {
        $oddEven = $input;
        break;
    }

    $line = explode(' ', $input);
    $command = strtolower($line[0]);
    if ($command === 'delete') {
        foreach ($arr as $key => $value) {
            if ($value === intval($line[1])) {
                unset($arr[$key]);
            }
        }
    } elseif ($command === 'insert') {
        $element = $line[1];
        $index = $line[2];
        array_splice($arr, $index, 0, $element);
    }
}

if($oddEven === 'Even'){
    $result = array_filter($arr, function($n){
        return $n % 2 === 0;
    });
    echo implode(' ', $result);
} else {
    $result = array_filter($arr, function($n){
        return $n % 2 !== 0;
    });
    echo implode(' ', $result);
}
