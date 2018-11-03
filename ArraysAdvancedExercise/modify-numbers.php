<?php

$numbers = array_map('intval', explode(' ', readline()));

while (true) {
    $input = readline();
    if ($input === 'end') {
        break;
    }

    $line = explode(' ', $input);
    $command = $line[0];
    if ($command === 'swap') {
        $index1 = $line[1];
        $index2 = $line[2];
        $first = $numbers[$index1];
        $second = $numbers[$index2];
        array_splice($numbers, $index1, 1);
        array_splice($numbers, $index1, 0, $second);
        array_splice($numbers, $index2, 1);
        array_splice($numbers, $index2, 0, $first);
    } elseif ($command === 'multiply') {
        $index1 = $line[1];
        $index2 = $line[2];
        $first = $numbers[$index1];
        $second = $numbers[$index2];
        $numbers[$index1] = $first * $second;
    } elseif ($command === 'decrease') {
        $num = $line[1];
        $numbers = array_map(function($n) use (&$num){
            return $n - $num;
        }, $numbers);
    } elseif ($command === 'increase') {
         $num = $line[1];
         $numbers = array_map(function($n) use (&$num){
            return $n + $num;
        }, $numbers);
    } elseif ($command === 'remove') {
        $index = $line[1];
        array_splice($numbers, $index, 1);
    }
}

echo implode(', ', $numbers);