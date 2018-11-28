<?php
$sequence = preg_split('/\s+/', readline());
$sum = 0;
for($i = 0; $i < count($sequence); $i++){
    $element = $sequence[$i];
    $firstLetter = $element[0];
    $firstLetterPosition = ord(strtoupper($firstLetter)) - ord('A') + 1;
    $lastLetter = substr($element, -1);
    $lastLetterPosition = ord(strtoupper($lastLetter)) - ord('A') + 1;
    $number = substr($element, 1, strlen($element)-2);
    if(ctype_upper($firstLetter)){
        $number /= $firstLetterPosition;
    } elseif (ctype_lower($firstLetter)){
        $number *= $firstLetterPosition;
    }

    if(ctype_upper($lastLetter)){
        $number -= $lastLetterPosition;
    } elseif (ctype_lower($lastLetter)){
        $number += $lastLetterPosition;
    }
    $sum += $number;
}

echo sprintf('%0.2f', $sum);