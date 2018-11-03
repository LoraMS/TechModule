<?php

$power = intval(readline());
$distance = intval(readline());
$exhaustionFactor = intval(readline());
$powerHalf = floatval($power * 0.5);
$counter = 0;

while ($power >= $distance){
    $power -= $distance;
    $counter ++;
    if((float)$power === $powerHalf && $exhaustionFactor > 0){
        $power = intval($power / $exhaustionFactor);
    }
}

echo $power.PHP_EOL;
echo $counter;