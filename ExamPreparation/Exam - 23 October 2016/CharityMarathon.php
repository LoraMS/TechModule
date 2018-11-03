<?php

$daysMarathon = intval(readline());
$runners = intval(readline());
$laps = intval(readline());
$trackLength = intval(readline());
$trackCapacity = intval(readline());
$amountMoney = floatval(readline());

$maximumRunners = $trackCapacity * $daysMarathon;
if($runners > $maximumRunners){
    $runners = $maximumRunners;
}

$totalMeters = $runners * $laps * $trackLength;
$totalKilometers = $totalMeters / 1000;
$totalMoney = $totalKilometers * $amountMoney;

echo 'Money raised: '.sprintf('%.2f', $totalMoney);