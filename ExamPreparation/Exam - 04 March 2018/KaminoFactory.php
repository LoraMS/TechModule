<?php
$len = intval(readline());
$bestCount = 0;
$sum = 0;
$bestSum = 0;
$bestStartIndex = -1;
$counter = 1;
$bestCounter = 1;
$bestSequence = [];

while(true){
    $input = readline();
    if($input === 'Clone them!'){
        break;
    }

    $line = array_map('intval', preg_split("/!+/", $input));
    $sum = array_sum($line);
    $count = 0;
    $startIndex = -1;
    $found = false;

    if ($counter == 1) {
        $bestSequence = $line;
        $bestSum = $sum;
        $bestCounter = $counter;
    }

    for($i = 0; $i < count($line); $i++){
        if($line[$i] === 1){
            $count ++;
            if (!$found) {
                $startIndex = $i;
                $found = true;
            }
            if($count > $bestCount){
                $bestCount = $count;
                $bestSum = $sum;
                $bestCounter = $counter;
                $bestStartIndex = $startIndex;
                $bestSequence = $line;
            } elseif ($count === $bestCount){
                if($startIndex < $bestStartIndex){
                    $bestStartIndex = $startIndex;
                    $bestCount = $count;
                    $bestSum = $sum;
                    $bestCounter = $counter;
                    $bestSequence = $line;
                } elseif ($sum > $bestSum){
                    $bestSum = $sum;
                    $bestStartIndex = $startIndex;
                    $bestCount = $count;
                    $bestCounter = $counter;
                    $bestSequence = $line;
                }
            }
        } else {
            $count = 0;
            $startIndex = -1;
            $found = false;
        }
    }
    $counter ++;
}

echo "Best DNA sample $bestCounter with sum: $bestSum.".PHP_EOL;
echo implode(' ', $bestSequence);
