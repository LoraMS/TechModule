<?php

$wingFlaps = intval(readline());
$distance = floatval(readline());
$endurance = intval(readline());

$meters = ($wingFlaps / 1000) * $distance;
echo number_format($meters, 2, '.', '').' m.'.PHP_EOL;

$flapTime = $wingFlaps / 100;
$restTime = intval($wingFlaps / $endurance) * 5;
$allTime = $flapTime + $restTime;
echo $allTime.' s.';

