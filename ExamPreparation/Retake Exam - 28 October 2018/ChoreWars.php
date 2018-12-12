<?php
$dishesPattern = '/<(?<dishes>[a-z0-9]+)>/';
$cleaningPattern = '/\[(?<cleaning>[A-Z0-9]+)\]/';
$laundryPattern = '/{(?<laundry>.+)}/';
$numberPattern = '/[0-9]/';
$dishesSum = 0;
$cleaningSum = 0;
$laundrySum = 0;

while(true){
    $line = readline();
    if($line === 'wife is happy'){
        break;
    }

    $command = '';
    if(preg_match($dishesPattern, $line, $match)){
        $command = $match['dishes'];
        preg_match_all($numberPattern, $command, $matches);
        $dishesSum += array_sum($matches[0]);
    } elseif(preg_match($cleaningPattern, $line, $match)){
        $command = $match['cleaning'];
        preg_match_all($numberPattern, $command, $matches);
        $cleaningSum += array_sum($matches[0]);
    } elseif(preg_match($laundryPattern, $line, $match)){
        $command = $match['laundry'];
        preg_match_all($numberPattern, $command, $matches);
        $laundrySum += array_sum($matches[0]);
    }
}

$totalSum = $dishesSum + $cleaningSum + $laundrySum;

echo "Doing the dishes - {$dishesSum} min.\n";
echo "Cleaning the house - {$cleaningSum} min.\n";
echo "Doing the laundry - {$laundrySum} min.\n";
echo "Total - {$totalSum} min.";
