<?php

$firstArr = array_map('intval', explode(' ', readline()));
$secondArr = array_map('intval', explode(' ', readline()));

$combined = [];
$result = [];
$rangeFirst = 0;
$rangeSecond = 0;
$start = 0;
$end = 0;

$reversedSecond = array_reverse($secondArr);
$lenFirst = count($firstArr);
$lenSecond = count($reversedSecond);
$minLen = min($lenFirst, $lenSecond);

for ($i = 0; $i < $minLen; $i++) {
    $combined[] = $firstArr[$i];
    $combined[] = $reversedSecond[$i];
}

if($lenFirst === $minLen){
    $rangeFirst = array_pop($reversedSecond);
    $rangeSecond = array_pop($reversedSecond);
} else {
    $rangeFirst = array_pop($firstArr);
    $rangeSecond = array_pop($firstArr);
}

if($rangeFirst < $rangeSecond){
    $start = $rangeFirst;
    $end = $rangeSecond;
} else {
    $start = $rangeSecond;
    $end = $rangeFirst;
}
 
for ($j = 0; $j < count($combined); $j++) {
    if ($combined[$j] > $start && $combined[$j] < $end) {
        $result[] = $combined[$j];
    }
}

sort($result);
echo implode(' ', $result);