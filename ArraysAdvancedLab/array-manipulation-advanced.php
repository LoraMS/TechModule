<?php

$array = array_map('intval', explode(' ', readline()));

while (true) {
    $input = readline();
    if ($input === 'end') {
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
    } elseif ($command === 'contains') {
        if (in_array($line[1], $array)) {
            echo 'Yes' . PHP_EOL;
        } else {
            echo 'No such number' . PHP_EOL;
        }
    } elseif ($command === 'print') {
        if ($line[1] === 'even') {
            $result = array_filter($array, "even");
            echo implode(' ', $result) . PHP_EOL;
        } elseif ($line[1] === 'odd') {
            $result = array_filter($array, "odd");
            echo implode(' ', $result) . PHP_EOL;
        }
    } elseif ($command === 'get') {
        echo array_sum($array) . PHP_EOL;
    } elseif ($command === 'filter') {
        $condition = $line[1];
        $num = $line[2];
        $result = [];
        if ($condition == '<') {
            $result = array_filter($array, function($n) use (&$num) {
                return $n < $num;
            });
        } elseif ($condition == '>') {
            $result = array_filter($array, function($n) use (&$num) {
                return $n > $num;
            });
        } elseif ($condition == '>=') {
            $result = array_filter($array, function($n) use (&$num) {
                return $n >= $num;
            });
        } elseif ($condition == '<=') {
            $result = array_filter($array, function($n) use (&$num) {
                return $n <= $num;
            });
        }
        echo implode(' ', $result) . PHP_EOL;
    }
}

echo implode(' ', $array);

function even($num) {
    return (!($num & 1));
}

function odd($num) {
    return (($num & 1));
}

//if (number & 1) {
//  // It's odd 
//}