<?php

$start = intval(readline());
$end = intval(readline());
$sum = 0;

for ($index = $start; $index <= $end; $index++) {
    echo $index.' ';
    $sum += $index;
}

echo "\nSum: $sum";