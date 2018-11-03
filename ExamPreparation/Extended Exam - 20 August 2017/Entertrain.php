<?php
$locomotivePower = intval(readline());
$wagonSequence = [];
while (true) {
    $input = readline();
    if ($input === 'All ofboard!') {
        break;
    }
    $wagonWeight = intval($input);
    $wagonSequence[] = $wagonWeight;

    if (array_sum($wagonSequence) > $locomotivePower) {
        $average = array_sum($wagonSequence) / count($wagonSequence);
        $index = findClosest($wagonSequence, $average);
        array_splice($wagonSequence, $index, 1);
    }
}

$wagonSequence = array_reverse($wagonSequence);
$wagonSequence[] = $locomotivePower;
echo implode(' ', $wagonSequence);

function findClosest($array, $num){
    $closest = 1001;
    $index = 0;
    for ($i = 0; $i < count($array); $i++) {
        $diff = abs($array[$i] - $num);
        if ($diff < $closest) {
            $closest = $diff;
            $index = $i;
        }
    }
    return $index;
}