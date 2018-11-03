<?php

$homes = intval(readline());
$presents = intval(readline());
$presentsInitial = $presents;
$counter = 0;
$presentsAdditional = 0;

for($i = 0; $i < $homes; $i++){
    $children = intval(readline());
    if($presents >= $children){
        $presents -= $children;
    } else {
        $presentsNext = intval($presentsInitial/($i+1)) * ($homes-$i-1) + ($children - $presents);
        $counter ++;
        $presentsAdditional += $presentsNext;
        $presents += ($presentsNext - $children);
    }
}

if($counter === 0){
    echo $presents;
} else {
    echo $counter.PHP_EOL;
    echo $presentsAdditional;
}

