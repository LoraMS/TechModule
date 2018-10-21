<?php

$array = array_map('intval', explode(' ', readline()));
$sum = intval(readline());

for ($i = 0; $i < count($array); $i++) {
    for ($j = $i; $j < count($array); $j++) {
        if ($array[$j] + $array[$i] === $sum && $i !== $j) {
            echo "$array[$i] $array[$j]".PHP_EOL;
        }
    }
}

