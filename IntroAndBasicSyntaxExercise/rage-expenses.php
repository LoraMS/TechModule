<?php

$lostGames = intval(readline());
$headsetPrice = floatval(readline());
$mousePrice = floatval(readline());
$keyboardPrice = floatval(readline());
$displayPrice = floatval(readline());

$headsetCount = 0;
$mouseCount = 0;
$keyboardCount = 0;
$displayCount = 0;

while ($lostGames > 0){
    if($lostGames % 2 === 0){
        $headsetCount ++;
    }
    
    if($lostGames % 3 === 0){
        $mouseCount ++;
    }
    
    if($lostGames % 2 === 0 && $lostGames % 3 === 0){
        $keyboardCount ++;
        if($keyboardCount % 2 === 0){
            $displayCount ++;
        }
    }
    
    $lostGames --;
}


$expenses = $headsetCount * $headsetPrice + $mouseCount * $mousePrice + $keyboardCount * $keyboardPrice + $displayCount * $displayPrice;

echo "Rage expenses: ". number_format($expenses, 2, '.', '')." lv.";