<?php

$len = intval(readline());
$bestLength = 0;
$bestDna = '';
$bestIndex = 0;
$bestSum = 0;
$counter = 0;
$bestCounter = 0;
$beginIndex = 0;

while (true) {
    $line = readline();
    $counter ++;
    if($line === 'Clone them!'){
        break;
    }
    $sequence = preg_replace("/!+/","", $line);
    $dna = preg_split('/0/', $sequence);
    
    $maxLength = 0;
    $sum = 0;
    $bestCurrentDna = '';
    for ($i = 0; $i < count($dna); $i++) {
        if(strlen($dna[$i]) > $maxLength){
            $maxLength = strlen($dna[$i]);
            $bestCurrentDna = $dna[$i];
        }
        
        $sum += strlen($dna[$i]);
    }
    
    if(!empty($bestCurrentDna)){
        $beginIndex = strpos($sequence, $bestCurrentDna);
    }

    if($maxLength > $bestLength){
        $bestLength = $maxLength;
        $bestDna = $sequence;
        $bestIndex = $beginIndex;
        $bestSum = $sum;
        $bestCounter = $counter;
    } elseif ($maxLength === $bestLength && ($beginIndex < $bestIndex || $sum > $bestSum)) {
        $bestLength = $maxLength;
        $bestDna = $sequence;
        $bestIndex = $beginIndex;
        $bestSum = $sum;
        $bestCounter = $counter;
    } elseif ($counter == 1) {
        $bestDna = $sequence;        
        $bestSum = $sum;
        $bestCounter = $counter;
    }
}

echo "Best DNA sample $bestCounter with sum: $bestSum." . PHP_EOL;
for ($j = 0; $j < strlen($bestDna); $j++) {
    echo $bestDna[$j].' ';
}