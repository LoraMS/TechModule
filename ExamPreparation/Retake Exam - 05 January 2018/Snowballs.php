<?php

$snowBalls = intval(readline());
$snowballSnowBest = 0;
$snowballTimeBest = 0;
$snowballQualityBest = 0;
$snowballValueBest = 0;

for($i = 0; $i < $snowBalls; $i++){
    $snowballSnow = intval(readline());
    $snowballTime = intval(readline());
    $snowballQuality = intval(readline());

    $snowballValue = bcpow(($snowballSnow / $snowballTime), $snowballQuality, 2);
    if($snowballValueBest < $snowballValue){
        $snowballValueBest = $snowballValue;
        $snowballSnowBest = $snowballSnow;
        $snowballTimeBest = $snowballTime;
        $snowballQualityBest = $snowballQuality;
        $snowballValueBest = $snowballValueBest;
    }
}

echo "$snowballSnowBest : $snowballTimeBest = $snowballValueBest ($snowballQualityBest)";
