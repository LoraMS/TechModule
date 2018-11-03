<?php

$bestSum = PHP_INT_MIN;
$bestAverage = 0;
$bestBatch = [];
$minCount = 1;

while (true) {
    $input = readline();
    if($input === 'Bake It!'){
        break;
    }
    
    $batch = array_map('intval', explode('#', $input));
    $sum = array_sum($batch);
    $count = count($batch);
    $average = $sum / $count;
    if($sum > $bestSum){
        $bestSum = $sum;
        $bestAverage = $average;
        $bestBatch = $batch;
        $minCount = $count;
    } elseif($sum === $bestSum){
        if($average > $bestAverage){
            $bestSum = $sum;
            $bestAverage = $average;
            $bestBatch = $batch;
            $minCount = $count;
        } elseif ($average === $bestAverage && $count < $minCount) {
            $bestSum = $sum;
            $minCount = $count;
            $bestAverage = $average;
            $bestBatch = $batch;
        }
    }
}

echo "Best Batch quality: $bestSum".PHP_EOL;
echo implode(' ', $bestBatch);
