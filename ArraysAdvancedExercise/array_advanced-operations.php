<?php

$numbers = array_map('intval', explode(' ', readline()));

while (true) {
    $input = readline();
    if ($input === 'End') {
        break;
    }

    $line = explode(' ', $input);
    $command = strtolower($line[0]);
    if ($command === 'add') {
        $number = intval($line[1]);
        array_push($numbers, $number);
    } elseif ($command === 'insert') {
        $index = intval($line[2]);
        $number = intval($line[1]);
        if ($index < 0 || $index > count($numbers)) {
            echo 'Invalid index' . PHP_EOL;
        } else {
            array_splice($numbers, $index, 0, $number);
        }
    } elseif ($command === 'remove') {
        //unset() not working when deleting numeric indexes -> to use with array_values($array) to rerender array indexes from 0
        $index = intval($line[1]);
        if ($index < 0 || $index > count($numbers)) {
            echo 'Invalid index' . PHP_EOL;
        } else {
            array_splice($numbers, $index, 1);
        }
    } elseif ($command === 'shift') {
        $direction = strtolower($line[1]);
        $count = intval($line[2]);
        if ($direction === 'left') {
            $numbers = shiftLeft($numbers, $count);
        } elseif ($direction === 'right') {
            $numbers = shiftRight($numbers, $count);
        }
    }
}

echo implode(' ', $numbers);

function shiftLeft($array, $count) {
    while ($count > 0) {
        $first = array_shift($array);
        $array[] = $first;
        $count --;
    }
    return $array;
}

function shiftRight($array, $count) {
    while ($count > 0) {
        $last = array_pop($array);
        array_unshift($array, $last);
        $count --;
    }
    return $array;
}
