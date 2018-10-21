<?php

$arrFirst = explode(' ', readline());
$arrSecond = explode(' ', readline());
$sum = 0;
$identical = false;
$index = 0;

for ($i = 0; $i < count($arrFirst); $i++) {
    if ($arrFirst[$i] === $arrSecond[$i]) {
        $identical = true;
        $sum += $arrFirst[$i];
    } else{
        $identical = false;
        $index = $i;
        break;
    }
}

if ($identical) {
    echo "Arrays are identical. Sum: $sum";
} else {
    echo "Arrays are not identical. Found difference at $index index.";
}