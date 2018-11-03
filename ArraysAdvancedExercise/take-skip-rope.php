<?php

$str = readline();
$digits = [];
$notDigits = '';
$takeList = [];
$skipList = [];
$result = '';
$takedSkiped = 0;
for ($i = 0; $i < strlen($str); $i++) {
    if(is_numeric($str[$i])){
        $digits[] = $str[$i];
    } else {
        $notDigits .= $str[$i];
    }
}

for ($j = 0; $j < count($digits); $j++) {
    if ($j % 2 === 0) {
        $takeList[] = $digits[$j];
    } else {
        $skipList[] = $digits[$j];
    }
}

for ($q = 0; $q < count($skipList); $q++) {
    $takeCount = $takeList[$q];
    $skipCount = $skipList[$q];
    
    $result .= substr($notDigits, $takedSkiped, $takeCount);
    $takedSkiped += $skipCount + $takeCount;
}

echo $result;