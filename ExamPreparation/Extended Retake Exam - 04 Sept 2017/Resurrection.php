<?php
$count = intval(readline());
for($i = 0; $i < $count; $i++){
    $totalLength = intval(readline());
    $totalWidth = floatval(readline());
    $wingLength = intval(readline());

    $totalYears = bcpow($totalLength,  2) * ($totalWidth + 2 * $wingLength);
    echo $totalYears.PHP_EOL;
}