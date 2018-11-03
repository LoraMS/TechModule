<?php
$sequence = array_map('intval', explode(' ', readline()));
$currentSequence = $sequence;
$position = array_pop($currentSequence);
$step = 0;
$isWet = false;

while(!$isWet){
    $currentSequence = array_map(function ($n){
        return $n-= 1;
    }, $currentSequence);

    for($i = 0; $i < count($currentSequence); $i++){
        if($currentSequence[$i] === 0 && $position === $i){
            $isWet = true;
            break;
        }
    }
    if($isWet){
        break;
    }
    for($i = 0; $i < count($currentSequence); $i++){
        if($currentSequence[$i] === 0){
            $currentSequence[$i] = $sequence[$i];
        }
    }
    $position = intval(readline());
    $step ++;
}

echo implode(' ', $currentSequence).PHP_EOL;
echo $step;