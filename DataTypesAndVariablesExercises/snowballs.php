<?php

$num = intval(readline());
$highestSnowballValue = 0;
$highestSnowballSnow = 0;
$highestSnowballTime = 0;
$highestSnowballQuality = 0;

for ($i = 0; $i < $num; $i++) {
    $snowballSnow = intval(readline());
    $snowballTime = intval(readline());
    $snowballQuality = intval(readline());
    
    $snowballValue = bcpow(($snowballSnow / $snowballTime), $snowballQuality, 2);
    
    if ($highestSnowballValue < $snowballValue) {
        $highestSnowballValue = $snowballValue;
        $highestSnowballSnow = $snowballSnow;
        $highestSnowballTime = $snowballTime;
        $highestSnowballQuality = $snowballQuality;
    }
}

echo "$highestSnowballSnow : $highestSnowballTime = $highestSnowballValue ($highestSnowballQuality)";

