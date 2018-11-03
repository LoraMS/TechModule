<?php
$arr = array_map('intval', explode(' ', readline()));

while(true){
    $input = readline();
    if($input === 'end'){
        break;
    }

    $line = explode(' ', $input);
    $command = $line[0];
    if($command === 'swap'){
        $index1 = $line[1];
        $index2 = $line[2];
        $element1 = $arr[$index1];
        $element2 = $arr[$index2];
        array_splice($arr, $index1, 1);
        array_splice($arr, $index1, 0, $element2);
        array_splice($arr, $index2, 1);
        array_splice($arr, $index2, 0, $element1);
    } elseif ($command === 'multiply'){
        $index1 = $line[1];
        $index2 = $line[2];
        $element1 = $arr[$index1];
        $element2 = $arr[$index2];
        $product = $element1 * $element2;
        $arr[$index1] = $product;
    } elseif ($command === 'decrease'){
        $arr = array_map(function($n){
            return $n - 1;
        }, $arr);
    }
}

echo implode(', ', $arr);