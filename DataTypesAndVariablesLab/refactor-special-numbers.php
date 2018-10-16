<?php

$number = intval(readline());
$sum = 0;
$current = 0;
$isSpecial = false;
for ($i = 1; $i <= $number; $i++) {
    $current = $i;
    while ($i > 0) {
        $sum += $i % 10;
        $i = $i / 10;
    }
    $isSpecial = ($sum == 5) || ($sum == 7) || ($sum == 11);
    $result = $isSpecial ? "True" : "False";
    echo sprintf("%d -> %s", $current, $result) . PHP_EOL;
    $sum = 0;
    $i = $current;
}


