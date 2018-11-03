<?php

$arrFirst = array_map('intval', explode(' ', readline()));
$arrSecond = array_map('intval', explode(' ', readline()));
$lenFirst = count($arrFirst);
$lenSecond = count($arrSecond);
$lenMin = min($lenFirst, $lenSecond);
$result = [];

for ($i = 0; $i < $lenMin; $i++) {
    $result[] = $arrFirst[$i];
    $result[] = $arrSecond[$i];
}

$lenMax = max($lenFirst, $lenSecond);

for ($j = $lenMin; $j < $lenMax; $j++) {
    if($lenFirst > $lenSecond){
        $result[] = $arrFirst[$j];
    } else {
        $result[] = $arrSecond[$j];
    }
}

echo implode(' ', $result);