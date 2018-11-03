<?php
$lostGames = intval(readline());
$headsetPrice = floatval(readline());
$mousePrice = floatval(readline());
$keyboardPrice = floatval(readline());
$displayPrice = floatval(readline());

$sum = 0;
$headsetCount = 0;
$mouseCount = 0;
$keyboardCount = 0;
$displayCount = 0;
$games = 0;

while($games < $lostGames){
    $games ++;

    if ($games % 3 === 0){
        $mouseCount ++;
    }

    if($games % 2 === 0){
        $headsetCount ++;
    }

    if($games %2 === 0 && $games %3 === 0){
        $keyboardCount ++;
        if ($keyboardCount % 2 === 0){
            $displayCount ++;
        }
    }
}

$sum = ($headsetPrice * $headsetCount) + ($mousePrice * $mouseCount) + ($keyboardPrice * $keyboardCount) + ($displayPrice * $displayCount);

echo 'Rage expenses: '.sprintf('%.2f', $sum).' lv.';