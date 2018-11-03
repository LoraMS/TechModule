<?php
$water = intval(readline());
$initialWater = $water;
$bottles = array_map('floatval', explode(' ', readline()));
$capacity = intval(readline());

//$water = 15;
//$bottles = [0, 0, 0, 0, 0];
//$capacity = 4;

$enough = false;
$len = count($bottles);
$indexesLeft = [];
$counter = 0;

if($water % 2 !== 0){
    for($i = count($bottles)-1; $i >= 0; $i--){
        $currentWater = $bottles[$i];
        $neededWater = $capacity - $currentWater;
        if($water - $neededWater < 0){
            $enough = false;
            $counter ++;
            $water -= $neededWater;
        } else {
            $water -= $neededWater;
            $enough = true;
        }
    }

} else {
    for($j = 0; $j < count($bottles); $j++){
        $currentWater = $bottles[$j];
        $neededWater = $capacity - $currentWater;
        if($water - $neededWater < 0){
            $enough = false;
            $counter ++;
            $water -= $neededWater;
        } else {
            $water -= $neededWater;
            $enough = true;
        }
    }
}

if($enough){
    echo 'Enough water!'.PHP_EOL;
    echo 'Water left: '.$water.'l.';
} else {
    echo 'We need more water!'.PHP_EOL;
    if($initialWater % 2 !== 0){
        echo 'Bottles left: '.$counter.PHP_EOL;
        echo 'With indexes: '.PHP_EOL;
        for($n = $counter-1; $n >= 0 ; $n--){
            $indexesLeft[] = $n;
        }
        echo implode(', ', $indexesLeft).PHP_EOL;
    } else {
        echo 'Bottles left: '.$counter.PHP_EOL;
        echo 'With indexes: ';
        for($m = $len-$counter; $m < count($bottles); $m++){
            $indexesLeft[] = $m;
        }
        echo implode(', ', $indexesLeft).PHP_EOL;
    }

    echo 'We need '.abs($water).' more liters!'.PHP_EOL;
}