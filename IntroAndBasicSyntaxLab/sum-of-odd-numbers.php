<?php

$n = intval(readline());
$counter = 0;
$sum = 0;

for ($index = 1; $index < 100; $index += 2) {
    echo $index."\n";
    $sum += $index;
    $counter++;
    if($counter >= $n){
        break;
    }
}

echo "Sum: $sum";