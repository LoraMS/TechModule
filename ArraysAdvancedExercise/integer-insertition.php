<?php

$numbers = array_map('intval', explode(' ', readline()));

while (true) {
    $str = readline();
    if ($str === 'end') {
        break;
    }
    $index = intval($str[0]);
    array_splice($numbers, $index, 0, $str);
}

echo implode(' ', $numbers);